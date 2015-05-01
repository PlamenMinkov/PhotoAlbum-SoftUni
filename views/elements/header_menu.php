<header>
    <ul class="header_ul">
<?php
    echo "<li><button class='header_buttons'><a href=\"http://". DB_HOST . ""
            . "{$GLOBALS['base_url']}\">"
            . "Home</a></button></li>";
            
    if(isset($_SESSION["user_id"])) {
        echo "<li><button class='header_buttons'><a href=\"http://". DB_HOST . ""
            . "{$GLOBALS['base_url']}images/upload\">"
            . "Upload Image</a></button></li>";
            
        echo "<li><button class='header_buttons'><a href=\"http://". DB_HOST . ""
            . "{$GLOBALS['base_url']}album/index\">"
            . "Create Album</a></button></li>";
            
        echo "<li><button class='header_buttons'><a href=\"http://". DB_HOST . ""
            . "{$GLOBALS['base_url']}album_types/index\">"
            . "Create Album Type</a></button></li>";
    }
    else {
        echo "<li><button class='header_buttons'><a href=\"http://". DB_HOST . ""
            . "{$GLOBALS['base_url']}login/index\">"
            . "Login</a></button></li>";
            
        echo "<li><button class='header_buttons'><a href=\"http://". DB_HOST . ""
            . "{$GLOBALS['base_url']}register/index\">"
            . "Register</a></button></li>";
    }
?>
    </ul>
</header>  

