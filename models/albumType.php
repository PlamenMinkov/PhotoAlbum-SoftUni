<?php
namespace Models;

class AlbumType_Model extends \Models\Master_Model {

    public function __construct( $args = array() ) {
        parent::__construct( array(
            'table' => 'album_types'
        ) );
    }
	
    public function get_album_types() {
        return parent::find( );
    }
}

