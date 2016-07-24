<?php
 
class Connect{
    function dbConnect($cmd){
        
    $dbServer = "localhost";
    $dbUser = "root";
    $dbPass = "";
    $dbName = "project_album";
    
    $conn = @mysqli_connect($dbServer, $dbUser, $dbPass, $dbName);
    
    if (mysqli_connect_errno($conn))
        die("無法連線資料庫伺服器");
        
    mysqli_set_charset($conn, "utf8");
    $result = mysqli_query($conn, $cmd);
    return $result;
    }
    
}
    
?>