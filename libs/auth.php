<?php

namespace Lib;

class Auth {
	
private static $session = null;

private function __construct() {
    // Session lifetime = 30min
    session_set_cookie_params(1800,"/");// set 30 min session live
    session_start();
}

public static function get_instance() {
    static $instance = null;

    if ( null === $instance ) {
        $instance = new static();
    }

    return $instance;
}

public function is_logged_in() {
    if ( isset( $_SESSION['username'] ) ) {
        return true;
    }
    return false;
}

    public function login( $username, $password ) {
        $username = trim($username);
        $username = mysqli_real_escape_string($GLOBALS['connection'], $username);
        $password = trim($password);
        $password = mysqli_real_escape_string($GLOBALS['connection'], $password);
        
        $userDB = mysqli_query($GLOBALS['connection'], 
                "SELECT * FROM users Where `username` = \"{$username}\" AND `password`=\"". md5($password) ."\"");
        
        
        if ( $row = $userDB->fetch_assoc() ) {
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['user_email'] = $row['email'];
            
            return true;
        }
        
        return false;
    }
    
    function register($username, $pass, $email)
    {
        $username = trim($username);
        
        if (!preg_match('/^[A-Za-z][A-Za-z0-9]{5,31}$/', $username)) {
            throw new Exception('Wrong Username');
        } 
        else {
            $username = mysqli_real_escape_string($GLOBALS['connection'], $username); // make data save before send query to MySQL
            $pass = trim($pass);
            $pass = mysqli_real_escape_string($GLOBALS['connection'], $pass);
            $email = trim($email);
            $email = mysqli_real_escape_string($GLOBALS['connection'], $email);
            $select = mysqli_query($GLOBALS['connection'], 'SELECT * FROM users Where `username` = "' . $username . '"');
            if ($select->num_rows > 0) {
                throw new Exception('Username already taken');
            }
            $ins = "INSERT INTO `users` (`username`, `password`,`email`, `admin`)
                        VALUES (\"{$username}\", md5(\"{$pass}\"), \"{$email}\", 0)";
            $q = mysqli_query($GLOBALS['connection'], $ins);
            if ($q == false) {
                throw new Exception('Query not executed');
            }
            else {                
                $this->login($username, $pass);
            }
        }
    }
    
    public function logout( ) {
        session_destroy();
    } 

    public function get_logged_user() {
        if ( ! isset( $_SESSION['username'] )  ) {
            return array();
        }

        return array( 
            'username' => $_SESSION['username'], 
            'user_id' => $_SESSION['user_id'] 
        );
    }
}