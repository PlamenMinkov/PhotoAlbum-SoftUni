<?php

namespace Controllers;

class Login_Controller extends Master_Controller {
	
	public function __construct() {
		parent::__construct( get_class(), 'master', '/views/login/' );
		
		// $this->model = new \Models\Artist();
		echo "Login Controller created<br />";
	}
	
	public function index() {
            $auth = \Lib\Auth::get_instance();

            $pageTitle = "login";        
            $template_name = $this->directory_path . $this->views_dir . 'index.php';

            $login_text = '';
            $user = $auth->get_logged_user();

            if ( empty( $user ) && isset( $_POST['username'] ) && isset( $_POST['password'] ) ) {

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
	
	public function logout() {
		$auth = \Lib\Auth::get_instance();
		
		$auth->logout();
		
		header( 'Location: ' . $this->directory_path );
		exit();
	}
}