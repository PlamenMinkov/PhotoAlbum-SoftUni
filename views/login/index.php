<?php
    include_once 'views/elements/header_menu.php';
    include_once 'views/elements/style.php';
?>
<section>
    <div class="img_container">
        <center><h3 class="container_title">Login Form</h3></center>
        <form method="POST" class="create">
                <p>
                        Username: <input type="text" name="username" />
                </p>
                <p>
                        Password: <input type="password" name="password" />
                </p>

                <input type="submit" />
        </form>
    </div>
</section>