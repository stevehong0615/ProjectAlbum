<?php

class SqlIndex{
    // 搜尋album資料表資料
    function sqlIndex(){
        $cmd = "SELECT * FROM `album`";
        // 連線資料庫
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
}
?>