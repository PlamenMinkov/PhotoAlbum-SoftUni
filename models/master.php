<?php
namespace Models;

class Master_Model {
    protected $connection;
    protected $table;
    protected $limit;
     
     public function __construct( $args = array() ) {
        $args = array_merge( array(
            'limit' => 0
        ), $args );
         
        if ( ! isset( $args['table'] ) ) {
            die( 'Table not defined. Please define a model table.' );
        }
        
        extract( $args );
		
        $this->table = $table;
        $this->limit = $limit;
        
        $db = \Lib\Database::getInstance();
        $db->setParameters('localhost', 'root', '', 'photo_album');
        $connection = $db->getConnection();
        mysqli_query($connection, 'SET NAMES utf8');
        mb_internal_encoding('UTF-8');
        if (!$connection) {
            echo 'Сриване на системата!!!';
            exit();
        }
        
        $this->connection = $connection;
     }
     
    public function get_by_id( $id ) {
        $results = $this->find( array( 'where' => 'id = ' .$id ) );
        //$results = $this->find( array( 'columns' => 'album_name', 'where' => 'id = ' .$id ) );
        return $results;
    } 
    
    public function get_album_type( $id ) {
        $results = $this->find( array( 'where' => 'id = ' .$id ) );

        return $results;
    } 
    
    public function find( $args = array() ) {
        $args = array_merge( array(
            'table' => $this->table,
            'where' => '',
            'columns' => '*',
            'limit' => 0
        ), $args );

        extract( $args );

        $query = "select {$columns} from {$table}";

        if( ! empty( $where ) ) {
                $query .= ' where ' . $where;
        }

        if( ! empty( $limit ) ) {
                $query .= ' limit ' . $limit;
        }

// 		var_dump($query);

        $result_set = $this->connection->query( $query );

        $results = $this->process_results( $result_set );

        return $results;
    }
    
    protected function process_results( $result_set ) {
        $results = array();

        if( ! empty( $result_set ) && $result_set->num_rows > 0) {
                while($row = $result_set->fetch_assoc()) {
                        $results[] = $row;
                }
        }

        return $results;
    }
    
    public function Index() {
        echo '<br/>dedede';
    }
}

