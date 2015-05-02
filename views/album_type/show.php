<?php 
    include_once 'views/elements/header_menu.php';
    include_once 'views/elements/aside_left.php';
    include_once 'views/elements/style.php';
    
    $type_name = "";
    $uri = $_SERVER['REQUEST_URI'];


    foreach( $this_type as $type ) {
        $type_name = $type["type_name"];
    }
    
    echo '<section class="body_section">'
        . '<div class="img_container">'
                . '<center><h3 class="container_title">Album Type ' .ucfirst($type_name)."</h3></center>";
foreach( $this_albums as $album ) {
        echo "<button class='center_buttons'><a href=\"http://". DB_HOST . ""
                . "{$GLOBALS['base_url']}albums/show/"
                . "{$album["id"]}\">{$album["album_name"]}</a><span> Rank: </span>".$album['rank']
                . "&nbsp&nbsp<a href=\"http://". DB_HOST . "{$GLOBALS['base_url']}views/album_type/upRank.php?id=".$album['id']. "&uri=".$uri."\">Up </a>"
                . "&nbsp&nbsp<a href=\"http://". DB_HOST . "{$GLOBALS['base_url']}views/album_type/downRank.php?id=".$album['id']. "&uri=".$uri."\">Down</a>"
                        . "</button>";
    }?>
    </div>
</section>

