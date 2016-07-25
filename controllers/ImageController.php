<?php
    class imageController extends Controller{
        
        // 判斷為delete 或 edit
        function conImage(){
            
            $delete = $_POST['delete'];
            $edit = $_POST['edit'];
            //print_r($delete);
            $del = $this->model("Image");
            
            if(isset($delete)){
                $del -> deleteImage($delete);
                header("location:/ProjectAlbum/");
                exit();
            }
            if(isset($edit)){
                $del -> editImage($edit);
                header("location:/ProjectAlbum/Image/editPhoto/$edit");
                
            }
        }
        
        // 到Image的function editImage取得資料
        function editPhoto($edit){
            $this->model("Image");
            $albumInfo = new Image();
            $result = $albumInfo->editImage($edit);
            $this->view("editPhoto", $result);
        }
        
        // 編輯照片
        function editImage(){
            $id = $_POST['id'];
            $comment = $_POST['comment'];
            $this->model("Image");
            $albumInfo = new Image();
            $result = $albumInfo->editImageFinish($id, $comment);
            $this->view("index", $result);
            header("location:/ProjectAlbum/Home/index");
        }
        
        // 新增照片頁面
        function addPhoto(){
            $this->view("addPhoto");
        }
        
        // 上傳照片
        function upload(){
            for ($i=0; $i<count($_FILES["UpPhoto"]); $i++) {
                if ($_FILES["UpPhoto"]["tmp_name"][$i] != "") {
                    $this->model("Image");
                    $add_Photo = new Image();
                    $addPhoto = $add_Photo->addNewPhoto($i);
                }
                header("location:/ProjectAlbum/Home/index");
                
            }
        }
        
    }
?>