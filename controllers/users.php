<?php
namespace Controllers;

class Users_Controller extends Master_Controller{
    public function __construct() {
        parent:: __construct( get_class(), 'user', 'views/user/' );
    }
    
    public function Index() {
        echo '<br/>';
        $users = $this->model->find();
        
        $pageTitle = "Users";
        
        $template_name = $this->directory_path . $this->views_dir . 'index.php';
        
        include_once $this->layout;
    }
}
