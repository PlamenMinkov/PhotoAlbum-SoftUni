<?php
namespace Controllers;

class Master_Controller {
    protected $layout;
    protected $views_dir;
    protected $directory_path;
    protected $model = null;
    protected $class_name = null;
     
    public function __construct($class_name = '\Controllers\Master_Controller', 
            $model = 'master',
            $views_dir = 'views/master/') {        
        $this->directory_path = str_replace("\\","/",DX_ROOT_DIR);
        $this->views_dir = $views_dir;
        $this->class_name = $class_name;
        
        include_once $this->directory_path . "models/{$model}.php";
        $model_class = "\Models\\" . ucfirst( $model ) . "_Model";  
		
        $this->model = new $model_class( array( 'table' => 'none' ) );
        
        $this->layout = $this->directory_path . 'views/layouts/defouts.php';
    }
     
    public function Index() {
        $pageTitle = "master";
        
        $template_name = $this->directory_path . 'views/master/index.php';
        
        include_once $this->directory_path . 'views/layouts/defouts.php';
    }
 }

