<?php 
class Image{
    function deleteImage($delete){
        // $cmd = "SELECT name FROM album WHERE id =".$delete;
        // $db = new Connect();
        // $result = $db->dbConnect($cmd);
        // while($row = mysqli_fetch_assoc($result)){
        //     $nameArray[] = $row['name'];
        // }
        // $albumArray = array('name'=>$nameArray);
        // unlink('/ProjectAlbum/images/'.$albumArray.'');
        
        $del = "DELETE FROM album WHERE id =".$delete;
        $deldb = new Connect();
        $delresult = $deldb->dbConnect($del);
    }
    
    function editImage($edit){
        $cmd = "SELECT * FROM album WHERE id =".$edit;
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
    
    function editImageFinish($id, $comment){
        $edit = "UPDATE album SET comment = '".$comment."' WHERE id = '".$id."'";
        $deldb = new Connect();
        $delresult = $deldb->dbConnect($edit);
    }
    
}
?>