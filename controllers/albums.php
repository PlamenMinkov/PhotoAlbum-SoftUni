<?php
namespace Controllers;

class Albums_Controller extends Master_Controller{
    public function __construct() {
        parent:: __construct( get_class(), 'album', 'views/album/' );
    }
    
    public function index() {
        $albums = $this->model->findByTableName("albums");
        $album_types = $this->model->findByTableName("album_types");
        
        $pageTitle = "Create Album";
        
        $template_name = $this->directory_path . $this->views_dir . 'create.php';
        
        include_once $this->layout;
        
        if(isset($_POST['submit']))
        {
            $album_type = explode("/", $_POST['type']);
            
            $data = array("name" => $_POST['album_name'],
                            "type_id" => $album_type[0]);
                        var_dump($data);
            $this->model->createNewAlbum($data);
        }
    }
    
    public function show($album_id) {
        $this_album = $this->model->findById("albums", $album_id);
        $albums = $this->model->findByTableName("albums");
        $album_types = $this->model->findByTableName("album_types");
        $images = $this->model->findByAlbumId($album_id);
        
        $pageTitle = "Show Images From Album";
        
        $template_name = $this->directory_path . $this->views_dir . 'index.php';
        
        include_once $this->layout;
    }
}
