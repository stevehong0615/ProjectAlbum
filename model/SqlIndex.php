<?php

class SqlIndex{
    function sqlIndex(){
        $cmd = "SELECT * FROM album";
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
        // var_dump($albumArray);
        // exit();
        return $albumArray;
    }
    
    function addPhoto(){
        
    }
    
}
?>