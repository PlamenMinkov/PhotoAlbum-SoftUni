<?php
namespace Models;

class Album_Model extends \Models\Master_Model {

    public function __construct( $args = array() ) {
        parent::__construct( array(
            'table' => 'albums'
        ) );
    }
	
    public function get_artists() {
        return parent::find( );
    }
}

