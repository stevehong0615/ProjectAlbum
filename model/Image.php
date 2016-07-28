<?php 
class Image{
    var $conn;
    // 刪除照片
    function deleteImage($delete){
        
        // 刪除資料夾內的檔案
        $cmd = "SELECT `name` FROM `album` WHERE `id` = '$delete'";
        $db = new Connect();
        $result = $db->dbConnect($cmd);
        while($row = mysqli_fetch_assoc($result))
            {$nameArray[] = $row['name'];}
        $albumArray = array('name'=>$nameArray);
        // var_dump($albumArray);
        $name = $albumArray['name'][0];
        unlink('images/'.$name.'');
        
        // 刪除資料表內的資料
        $del = "DELETE FROM album WHERE id ='$delete'";
        $deldb = new Connect();
        $this->conn = $deldb;
        $delresult = $deldb->dbConnect($del);
    }
    
    // 照片編輯頁面的資料
    function editImage($edit){
        $cmd = "SELECT * FROM `album` WHERE `id` ='$edit'";
        $db = new Connect();
        $result = $db->dbConnect($cmd);
        while($row = mysqli_fetch_assoc($result)){
            $idArray[] = $row['id'];
            $nameArray[] = $row['name'];
            $dateArray[] = $row['date'];
            $commentArray[] = $row['comment'];
        }
        $albumArray = array('id'=>$idArray,
                            'name'=>$nameArray,
                            'date'=>$dateArray,
                            'comment'=>$commentArray);
        return $albumArray;
    }
    
    // 照片編輯傳回資料表
    function editImageFinish($id, $comment){
        $edit = "UPDATE `album` SET `comment` = '$comment' WHERE `id` = '$id'";
        $deldb = new Connect();
        $delresult = $deldb->dbConnect($edit);
    }
    
    // 新增照片
    function addNewPhoto($i){
        $Photo_Name = $_FILES['UpPhoto']['name'][$i];
        $date = "NOW()";
        $Photo_Comment = $_POST['Photo_Comment'][$i];
        $query_insert = "INSERT INTO `album` (`name`, `date`, `comment`) VALUES ('$Photo_Name', '$date', '$Photo_Comment')";
        
        $db = new Connect();
        $result = $db->dbConnect($query_insert);
        
        // 照片新增到資料夾  
        if(!move_uploaded_file($_FILES["UpPhoto"]["tmp_name"][$i], "images/" . $Photo_Name)) die("上傳失敗！");
    }
}
?>