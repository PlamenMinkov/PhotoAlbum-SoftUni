<aside>
    <center><h3 class="container_title">Albums</h3></center>
<?php
    foreach( $albums as $album ) {
        
        echo "<button class='aside_buttons'><a href=\"http://". DB_HOST . ""
                . "{$_SERVER['REQUEST_URI']}albums/show/"
                . "{$album["id"]}\">{$album["album_name"]}</a></button>";
    }
    
    echo '<center><h3 class="container_title">Album Types</h3></center>';
    foreach( $album_types as $album_type ) {
        echo "<button class='aside_buttons'><a href=\"http://". DB_HOST . ""
                . "{$_SERVER['REQUEST_URI']}album_types/show/{$album_type["id"]}\">"
                . "{$album_type["type_name"]}</a></button>";
    }
?>
</aside>

