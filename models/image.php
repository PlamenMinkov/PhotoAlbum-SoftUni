<?php
namespace Models;

class Image_Model extends \Models\Master_Model {

    public function __construct( $args = array() ) {
        parent::__construct( array(
            'table' => 'images'
        ) );
    }
	
    public function get_albums() {
        return parent::find( );
    }
    
    
}

