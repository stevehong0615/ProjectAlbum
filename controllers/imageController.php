<?php
    class imageController extends Controller{
    
        function conImage($image){
            $delete = $_POST['delete'];
            $edit = $_POST['edit'];
            $del = $this->model("Image");
            
            if($image == "delete"){
                $del -> deleteImage($delete);
                header("/ProjectAlbum/");
            }
            if($image == "edit"){
                $del -> editImage($edit);
                header("/ProjectAlbum/Home/editPhoto");
        
            }
        }
        
    }
?>