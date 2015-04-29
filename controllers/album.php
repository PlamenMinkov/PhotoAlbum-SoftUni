<?php
namespace Controllers;

class Album_Controller extends Master_Controller{
    public function __construct() {
        parent:: __construct( 'views/album/' );
    }
    
    public function Index() {
        $pageTitle = "albums";
        
        $template_name = $this->directory_path . $this->views_dir . 'index.php';
        
        include_once $this->layout;
    }
}
