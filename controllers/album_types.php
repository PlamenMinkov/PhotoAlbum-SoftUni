<?php
namespace Controllers;

class Album_types_Controller extends Master_Controller{
    public function __construct() {
        parent:: __construct( get_class(), 'albumType', 'views/album_type/' );
    }
    
    public function Index() {
        echo '<br/>';
        $album_types = $this->model->find();
        
        $pageTitle = "Album Types";
        
        $template_name = $this->directory_path . $this->views_dir . 'index.php';
        
        include_once $this->layout;
    }
}
