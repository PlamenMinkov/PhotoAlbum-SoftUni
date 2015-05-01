<?php
    //session_start();
    //include 'includes/functions.php';
    include_once 'libs/Database.php';
    
    
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title><?= $pageTitle ?></title>
    <link rel="stylesheet" type="text/css" href="style/style.css" />
</head>
<body>
<div id="container">
            <?php if( ! empty( $this->logged_user ) ): ?>
                <div id="user_center">
                    <p>
                        Welcome, <?php echo $this->logged_user['username']; ?>!
                        <a href="http://<?php echo DB_HOST . $_SERVER['REQUEST_URI'] ?>login/logout">[Logout]</a>
                    </p>
                </div>
<?php endif; ?>

