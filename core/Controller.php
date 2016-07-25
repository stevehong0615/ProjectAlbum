<?php

class Controller {
    public function model($model) {
        require_once "model/$model.php";
        return new $model ();
    }
    
    public function css($name) {
        echo '<link rel="stylesheet" href="/ProjectAlbum/css/'.$name.'.css"/>';
    }
    
    public function script($name) {
        echo '<script src="/ProjectAlbum/js/'.$name.'.js"></script>';
    }
    
    public function view($view, $data = Array()) {
        require_once "views/$view.php";
    }
}

?>