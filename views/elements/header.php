<?php
    //session_start();
    //include 'includes/functions.php';
    include_once 'libs/Database.php';
    
    
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title><?= $pageTitle ?></title>
</head>
<body>
<div id="container">
            <div id="top-menu">
                <ul>
                    <li>Menu 1</li>
                    <li>Menu 2</li>
                </ul>
            </div>
            <?php if( ! empty( $this->logged_user ) ): ?>
                <div id="user_center">
                    <p>
                        Welcome, <?php echo $this->logged_user['username']; ?>!
                        <a href="<?php echo $this->directory_path; ?>login/logout">[Logout]</a>
                    </p>
                </div>
<?php endif; ?>

