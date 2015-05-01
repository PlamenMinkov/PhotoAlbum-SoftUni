<?php
namespace Controllers;

class Images_Controller extends Master_Controller{
    public function __construct() {
        parent:: __construct( get_class(), 'image', 'views/image/' );
    }
    
    public function Index() {
        echo '<br/>';
        $images = $this->model->find();
        
        $pageTitle = "images";
        
        $template_name = $this->directory_path . $this->views_dir . 'index.php';
        
        include_once $this->layout;
    }
    
    public function upload() {
        $pageTitle = "upload images";
        
        $template_name = $this->directory_path . $this->views_dir . 'upload.php';
        
        include_once $this->layout;
        
        if(isset($_POST['submit']) && count($_FILES) > 0)
        {
            $this->model->uploadImages($_FILES['fileToUpload'], $_POST['type'], $_POST['img_name']);
        }
    }
}