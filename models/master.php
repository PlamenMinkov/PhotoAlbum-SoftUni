<?php
namespace Models;

class Master_Model {
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

        $result_set = $GLOBALS['connection']->query( $query );

        $results = $this->process_results( $result_set );

        return $results;
    }
    
    public function findByTableName($table_name) {

        $query = "select * from `{$table_name}`";

        $result_set = $GLOBALS['connection']->query( $query );

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
    
    public function uploadImages($file, $album_type, $file_name) {
        $image = $file;
        $file_type = $image['type'];
        $file_size = $image['size'];
        $file_path = $image['tmp_name'];

        $picName = $file_name . '.' . str_replace('image/', '', $file_type);

        if (!($file_type == "image/jpeg" || $file_type == "image/png" || $file_type == "image/gif")) {
            throw new Exception('Invalid extension for avatar');
        }
        if (!($file_size < 1048576)) {
            throw new Exception('File is too big.');
        }

        $album_type = explode("/", $album_type);

        if (!file_exists('uploads' . DIRECTORY_SEPARATOR . $album_type[1])) {
            mkdir('uploads' . DIRECTORY_SEPARATOR . $album_type[1], 0777);
        }

        $uploaded = move_uploaded_file($file_path, 'uploads' . DIRECTORY_SEPARATOR . $album_type[1] . DIRECTORY_SEPARATOR . $picName);

        if ($uploaded == false) {
            throw new Exception('File upload failed');
        } else {
            $ins = "INSERT INTO `images` ( `image_name`,`album_id`, `user_id`)
                        VALUES (\"{$picName}\", {$album_type[0]}, {$_SESSION['user_id']})";
            echo $ins;      
            $q = mysqli_query($GLOBALS['connection'], $ins);
        }
    }
}

