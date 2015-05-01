<?php 
    include_once 'views/elements/header_menu.php';
    include_once 'views/elements/aside_left.php';
    include_once 'views/elements/style.php';
    
    echo '<section class="body_section">'
        . '<div class="img_container">'
                . '<center><h3 class="container_title">Upload Images</h3></center>';
?>
<form action="" method="post" enctype="multipart/form-data" class="create">
    Select album:
    <select name="type">
    <?php
        $result = mysqli_query($GLOBALS['connection'], "SELECT * FROM `albums`");
        
        while ($row = mysqli_fetch_array($result)) {
            echo '<option value="'.$row[0].'/'.$row[1].'">' . $row[1] .
                        '</option>';
        }
    ?>
    </select><br/>
    <input type="file" name="fileToUpload" id="fileToUpload"><br/>
    <span>Name: </span><input type="text" name="img_name"><br/>
    <input type="submit" value="Upload Image" name="submit">
</form>
</div>
</section>
