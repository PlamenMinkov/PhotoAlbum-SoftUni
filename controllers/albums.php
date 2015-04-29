<?php
namespace Controllers;

class Albums_Controller extends Master_Controller{
    public function __construct() {
        parent:: __construct( get_class(), 'album', 'views/album/' );
    }
    
    public function Index() {
        $pageTitle = "album";
        
        $template_name = $this->directory_path . $this->views_dir . 'index.php';
        
        include_once $this->layout;
    }
}