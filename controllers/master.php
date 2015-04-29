<?php
namespace Controllers;

 class Master_Controller {
     protected $layout;
     protected $views_dir;
     protected $directory_path;
     
     public function __construct($views_dir = 'views/master/') {
         
         
         $this->directory_path = str_replace("\\","/",DX_ROOT_DIR);
         $this->views_dir = $views_dir;
         $this->layout = $this->directory_path . 'views/layouts/defouts.php';
     }
     
    public function Index() {
        $pageTitle = "master";
        
        $template_name = $this->directory_path . 'views/master/index.php';
        
        include_once $this->directory_path . 'views/layouts/defouts.php';
    }
 }

