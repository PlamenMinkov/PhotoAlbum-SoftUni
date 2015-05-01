<?php
    include_once 'views/elements/header_menu.php';
    include_once 'views/elements/style.php';
?>
<section>
    <div class="img_container">
        <center><h3 class="container_title">Login Form</h3></center>
        <form method="POST" class="create">
            <p>
                    Username: <input type="text" name="reg_username" />
            </p>
            <p>
                    Password: <input type="password" name="reg_password" />
            </p>
            <p>
                    e-mail: <input type="e-mail" name="reg_email" />
            </p>
            <input type="submit" />
        </form>
    </div>
</section>