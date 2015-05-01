<?php 
    include_once 'views/elements/header_menu.php';
    include_once 'views/elements/aside_left.php';
    include_once 'views/elements/style.php';
    
    echo '<section class="body_section">'
        . '<div class="img_container">'
                . '<center><h3 class="container_title">Create Album</h3></center>';
?>
        <form action="" method="post" enctype="multipart/form-data" class="create">
            Select album type:
            <select name="type">
            <?php
                $result = mysqli_query($GLOBALS['connection'], "SELECT * FROM `album_types`");

                while ($row = mysqli_fetch_array($result)) {
                    echo '<option value="'.$row[0].'/'.$row[1].'">' . $row[1] .
                                '</option>';
                }
            ?>
            </select><br/>
            <span>Name: </span><input type="text" name="album_name"><br/>
            <input type="submit" value="Create Album" name="submit">
        </form>
    </div>
</section>

