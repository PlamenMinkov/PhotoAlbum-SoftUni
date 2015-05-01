<?php
namespace Controllers;

class Images_Controller extends Master_Controller{
    public function __construct() {
        parent:: __construct( get_class(), 'image', 'views/image/' );
    }
    
    public function Index() {
        echo '<br/>';
        $images = $this->model->find();
        
        $pageTitle = "images";
        
        $template_name = $this->directory_path . $this->views_dir . 'index.php';
        
        include_once $this->layout;
    }
    
    public function upload() {
        if ( isset( $_POST['username'] ) && isset( $_POST['password'] ) ) {

            $logged_in = $auth->login( $_POST['username'], $_POST['password'] );

            if ( ! $logged_in ) {
                    $login_text = 'Login not successful.';
            } else {
                    $login_text = 'Login was successful! Hi ' . $_POST['username'];
            }
        }

        $template_file = $this->directory_path . $this->views_dir . 'login.php';

        include_once $this->layout;
    }
}