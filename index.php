<?php
    define('DX_ROOT_DIR', realpath(dirname(__FILE__)) . '/');// here we get directory of this file
    define('DX_ROOT_PATH', basename(dirname(__FILE__)) . '/');// here we get selected inner dir
    
    
    $request = $_SERVER['REQUEST_URI'];
    $request_home = '/' . DX_ROOT_PATH;
    $GLOBALS['base_url'] = "";
    
    $controller = 'master';
    $method = "index";
    $param = array();
    
    $condition = true;

    foreach (glob('libs/*.php') as $file) {
        include_once $file;
    }
    
    include_once 'config/dataForDB.php';
    include_once 'controllers/master.php';
    include_once 'models/master.php';
    
    if(!(empty($request))) {
        if(strpos($request, $request_home)) { // see if the $request_home is in $request
            $start_pos = strpos($request, $request_home);
            
            $GLOBALS['base_url'] = substr($request, 0, $start_pos + strlen($request_home));
            $request = substr($request, $start_pos + strlen($request_home));
                        
            $componets = explode('/', $request, 3);
            
            if(count($componets) > 0 && 
                        $componets[0] != "" && 
                        count($componets) < 2) {
                $controller = $componets[0];
                
                if (file_exists('controllers' . DIRECTORY_SEPARATOR .$controller. '.php')) {
                    include_once 'controllers/' .$controller. '.php'; 
                }
                else {
                    $condition = false;
                }
            }
            else if(count($componets) > 1) {
                list($controller, $method) = $componets;
                
                if(isset($componets[2])) {
                    $param = $componets[2];
                }
                
                if (file_exists('controllers' . DIRECTORY_SEPARATOR .$controller. '.php')) {
                    include_once 'controllers/' .$controller. '.php'; 
                }
                else {
                    $condition = false;
                }
            }
        }
    }
    
    if($condition) {
        $controller_class = '\Controllers\\' . ucfirst($controller) . '_Controller';// ucfirst make first case upper

        $controller_instance = new $controller_class();

        if(method_exists($controller_instance, $method)) {// see if in this class exist method == $method.value
            call_user_func_array(array($controller_instance, $method), array($param));
        }
        else {
            header('Location: http://'. DB_HOST.$GLOBALS['base_url']);
        }
    }
    else {
        header('Location: http://'. DB_HOST.$GLOBALS['base_url']);
    }
    
?>
