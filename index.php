<?php
    define('DX_ROOT_DIR', realpath(dirname(__FILE__)) . '/');// here we get directory of this file
    define('DX_ROOT_PATH', basename(dirname(__FILE__)) . '/');// here we get selected inner dir
    
    $request = $_SERVER['REQUEST_URI'];
    $request_home = '/' . DX_ROOT_PATH;
    
    $controller = 'master';
    $method = "index";
    $param = array();

    include_once 'libs/Database.php';
    include_once 'controllers/master.php';
    include_once 'models/master.php';
    
    if(!(empty($request))) {
        if(strpos($request, $request_home)) { // see if the $request_home is in $request
            $start_pos = strpos($request, $request_home);
            
            $request = substr($request, $start_pos + strlen($request_home));
            
            $componets = explode('/', $request, 3);
            
            if(count($componets) > 1) {
                list($controller, $method) = $componets;
                
                if(isset($componets[2])) {
                    $param = $componets[2];
                }
                
//                if(!class_exists('\Controllers\\' . ucfirst($controller) . '_Controller')) {
//                    echo '<br/>Greshkaaaaaa';
//                }
//                else {
                    include_once 'controllers/' .$controller. '.php';
                    //include_once 'models/' .$controller. '.php';
                //}                
            }
        }
    }
            
    $controller_class = '\Controllers\\' . ucfirst($controller) . '_Controller';// ucfirst make first case upper
    
//    if(!class_exists('\Controllers\\' . ucfirst($controller) . '_Controller')) {
//        echo '<br/>Greshkaaaaaa';
//    }
//    else {
        $controller_instance = new $controller_class();
    
        if(method_exists($controller_instance, $method)) {// see if in this class exist method == $method.value
            call_user_func_array(array($controller_instance, $method), array($param));
        }
    //}    
?>
