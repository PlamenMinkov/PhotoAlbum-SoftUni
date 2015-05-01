<?php

namespace Controllers;

class Register_Controller extends Master_Controller {
	
	public function __construct() {
		parent::__construct( get_class(), 'master', '/views/register/' );
		
		echo "Register Controller created<br />";
	}
	
	public function index() {
            $auth = \Lib\Auth::get_instance();

            $pageTitle = "register";        
            $template_name = $this->directory_path . $this->views_dir . 'index.php';

            if ( isset( $_POST['reg_username'] ) && isset( $_POST['reg_password'] ) &&
                    isset( $_POST['reg_email'] )) {

                $register = $auth->register( $_POST['reg_username'], $_POST['reg_password'],
                                                $_POST['reg_email']);

                if ( ! $register ) {
                        $login_text = 'Register not successful.';
                } else {
                        $login_text = 'Register was successful! Hi ' . $_POST['reg_username'];
                }
            }

            $template_file = $this->directory_path . $this->views_dir . 'register.php';

            include_once $this->layout;
	}
	
	public function logout() {
		$auth = \Lib\Auth::get_instance();
		
		$auth->logout();
		
		header( 'Location: ' . $this->directory_path );
		exit();
	}
}