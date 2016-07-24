<?php
    class imageController extends Controller{
    
        function conImage(){
            $delete = $_POST['delete'];
            $edit = $_POST['edit'];
            //print_r($delete);
            $del = $this->model("Image");
            
            if(isset($delete)){
                $del -> deleteImage($delete);
                header("location:/ProjectAlbum/");
            }
            if(isset($edit)){
                //$del -> editImage($edit);
                header("location:/ProjectAlbum/Image/editPhoto/$edit");
                
            }
        }
        
        function editPhoto($edit){
            $this->model("Image");
            $albumInfo = new Image();
            $result = $albumInfo->editImage($edit);
            $this->view("editPhoto", $result);
        }
        
        function editImage(){
            $id = $_POST['id'];
            $comment = $_POST['comment'];
            $this->model("Image");
            $albumInfo = new Image();
            $result = $albumInfo->editImageFinish($id, $comment);
            $this->view("index", $result);
            header("location:/ProjectAlbum/Home/index");
        }
        
    }
?>