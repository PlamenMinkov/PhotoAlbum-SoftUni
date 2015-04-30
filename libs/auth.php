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
        $db = \Lib\Database::getInstance();
        $db->setParameters('localhost', 'root', '', 'photo_album');
        $connection = $db->getConnection();
        mysqli_query($connection, 'SET NAMES utf8');
        mb_internal_encoding('UTF-8');
        if (!$connection) {
            echo 'Сриване на системата!!!';
            exit();
        }
        
        $username = trim($username);
        $username = mysqli_real_escape_string($connection, $username);
        $password = trim($password);
        $password = mysqli_real_escape_string($connection, $password);
        
        $userDB = mysqli_query($connection, 
                "SELECT * FROM users Where `username` = \"{$username}\" AND `password`=\"". $password ."\"");
        
        
        if ( $row = $userDB->fetch_assoc() ) {
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['user_email'] = $row['email'];
            
            return true;
        }
        
        return false;
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