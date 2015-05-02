<?php
namespace Controllers;

class Album_types_Controller extends Master_Controller{
    public function __construct() {
        parent:: __construct( get_class(), 'albumType', 'views/album_type/' );
    }
    
    public function Index() {
        echo '<br/>';
        
        $albums = $this->model->findByTableName("albums");
        $images = $this->model->findByTableName("images");
        $album_types = $this->model->find();
        
        $pageTitle = "Album Types";
        
        $template_name = $this->directory_path . $this->views_dir . 'index.php';
        
        include_once $this->layout;
        
        if(isset($_POST['submit']))
        {            
            $ins = "INSERT INTO `album_types` ( `type_name`)
                    VALUES (\"{$_POST["type_name"]}\")";
                        
            $q = mysqli_query($GLOBALS['connection'], $ins);
        }
    }
    
    public function show($type_id) {
        $this_type = $this->model->findById("album_types", $type_id);
        $albums = $this->model->findByTableName("albums");
        $album_types = $this->model->findByTableName("album_types");
        $this_albums = $this->model->findByTypeId($type_id);
        
        $pageTitle = "Show Albums From Type";
        
        $template_name = $this->directory_path . $this->views_dir . 'show.php';
        
        include_once $this->layout;
    }
}
