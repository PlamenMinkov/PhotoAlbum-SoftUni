<?php
namespace Models;

class Album_Model extends \Models\Master_Model {

    public function __construct( $args = array() ) {
        parent::__construct( array(
            'table' => 'albums'
        ) );
    }
	
    public function get_albums() {
        return parent::find( );
    }
    
    public function createNewAlbum($param_array) {
        $album_name = $param_array["name"];
        $album_type_id = $param_array["type_id"];
        
        $ins = "INSERT INTO `albums` ( `album_name`,`year`, `rank`, `album_type_id`)
                    VALUES (\"{$album_name}\", ". date("Y") . ", 0, {$album_type_id})";
                        
        $q = mysqli_query($GLOBALS['connection'], $ins);
    }
}

