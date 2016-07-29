<?php
    class ImageController extends Controller{
        
        // 判斷為delete 或 edit
        function conImage(){
            $delete = $_POST['delete'];
            $edit = $_POST['edit'];
            $del = $this->model("Image");
            
            if($delete != null){
                $del -> deleteImage($delete);
                header("location:/ProjectAlbum/");
            }
            if($edit != null){
                $del -> editImage($edit);
                header("location:/ProjectAlbum/Image/editPhoto/$edit");
            }
        }
        
        // 到Image的function editImage取得資料
        function editPhoto($edit){
            $albumInfo = $this->model("Image");
            $result = $albumInfo->editImage($edit);
            $this->view("editPhoto", $result);
        }
        
        // 編輯照片
        function editImage(){
            $id = $_POST['id'];
            $comment = $_POST['comment'];
            $albumInfo = $this->model("Image");
            $result = $albumInfo->editImageFinish($id, $comment);
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
                    $add_Photo = $this->model("Image");
                    $addPhoto = $add_Photo->addNewPhoto($i);
                }
            header("location:/ProjectAlbum/Home/index");
            }
        }
    }
?>