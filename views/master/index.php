<header>
    <ul>
<?php
    foreach( $album_types as $album_type ) {
        echo "<li><button><a href=\"http://". DB_HOST . ""
                . "{$_SERVER['REQUEST_URI']}album_types/show/{$album_type["id"]}\">"
                . "{$album_type["type_name"]}</a></button></li>";
    }
?>
    </ul>
</header>  
<?php
    foreach( $albums as $album ) {
        echo "<button><a href=\"http://". DB_HOST . "{$_SERVER['REQUEST_URI']}albums/show/{$album["id"]}\">{$album["album_name"]}</a></button>";
    }
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

    <img width="100" height="100" src="uploads/<?php echo $album;?>/<?php echo $img_name;?>">

<?php endforeach; ?>

