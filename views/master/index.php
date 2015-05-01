<?php
    include_once 'views/elements/header_menu.php';
    include_once 'views/elements/aside_left.php';

    echo '<section class="body_section">'
    . '<div class="img_container">'
            . '<center><h3 class="container_title">All Images</h3></center>';
    
    foreach( $images as $image ) : 
        $img_name = $image["image_name"];
        $album_id = $image["album_id"];
        $album;    

        $ins = "SELECT * FROM `albums` WHERE `id`={$album_id}";

        $result = mysqli_query($GLOBALS['connection'], $ins);

        while ($row = mysqli_fetch_array($result)) {
                $album = $row[1];
        }
    ?>

    <img width="200" height="200" src="uploads/<?php echo $album;?>/<?php echo $img_name;?>">

<?php endforeach; ?>
    
    </div>
</section>
