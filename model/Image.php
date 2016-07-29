<?php 
class Image extends Connect{
    
    // 刪除照片
    function deleteImage($delete){
        
        // 刪除資料夾內的檔案
        $deleteFolderPhoto = $this->db->query("SELECT `name` FROM `album` WHERE `id` = '$delete'");
        $result = $deleteFolderPhoto->fetchAll(PDO::FETCH_ASSOC);
        //echo $result[0]['name'];
        unlink('images/'.$result[0]['name'].'');
        
        // 刪除資料表內的資料
        $deletePhoto = $this->db->query("DELETE FROM album WHERE id ='$delete'");
        return;
    }
    
    // 照片編輯頁面的資料
    function editImage($edit){
        $selectPhoto = $this->db->query("SELECT * FROM `album` WHERE `id` ='$edit'");
        $result = $selectPhoto->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    
    // 照片編輯傳回資料表
    function editImageFinish($id, $comment){
        $this->db->query("UPDATE `album` SET `comment` = '$comment' WHERE `id` = '$id'");
        return;
    }
    
    // 新增照片
    function addNewPhoto($i){
        $Photo_Name = $_FILES['UpPhoto']['name'][$i];
        $date = "NOW()";
        $Photo_Comment = $_POST['Photo_Comment'][$i];
        $this->db->query("INSERT INTO `album` (`name`, `date`, `comment`) VALUES ('$Photo_Name', '$date', '$Photo_Comment')");

        // 照片新增到資料夾  
        if(!move_uploaded_file($_FILES["UpPhoto"]["tmp_name"][$i], "images/" . $Photo_Name)) die("上傳失敗！");
        return;
    }
}
?>