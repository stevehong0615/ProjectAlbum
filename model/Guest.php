<?php

class Guest{
    function sqlUser($account){
        // 搜尋users_table資料表定使用者名稱的資料
        $user = "SELECT * FROM users_table where user_name = '$account'";
        // 連線資料庫
        $db = new Connect();
        $result = $db->dbConnect($user);
        
        while($row = mysqli_fetch_assoc($result)){
            
            $idArray[] = $row['id'];
            $user_nameArray[] = $row['user_name'];
            $passwordArray[] = $row['password'];
            $nicknameArray[] = $row['nickname'];
            
        }
        $userArray = array('id'=>$idArray,
                            'user_name'=>$user_nameArray,
                            'password'=>$passwordArray,
                            'nickname'=>$nicknameArray);
        // var_dump($albumArray);
        // exit();
        return $userArray;
    }
    
    function sqlAddUser($account, $pw, $nickname){
        //新增user
        $addUserSql = "INSERT INTO users_table (user_name, password, nickname) VALUES ('$account', '$pw', '$nickname')";
        $db = new Connect();
        $result = $db->dbConnect($addUserSql);
    }
    
    function sqlSecretUser($account){
        $user = "SELECT * FROM users_table where user_name = '$account'";
        $db = new Connect();
        $result = $db->dbConnect($user);
        
        while($row = mysqli_fetch_assoc($result)){
            $idArray[] = $row['id'];
            $user_nameArray[] = $row['user_name'];
            $passwordArray[] = $row['password'];
            $nicknameArray[] = $row['nickname'];
            
        }
        $userArray = array('id'=>$idArray,
                            'user_name'=>$user_nameArray,
                            'password'=>$passwordArray,
                            'nickname'=>$nicknameArray);
        return $userArray;
    }
    
    function editUser($username, $pw, $nickname){
        //編輯user的資料
        $editUser = "UPDATE users_table SET password = '$pw', nickname = '$nickname' where user_name = '$username'";
        $db = new Connect();
        $result = $db->dbConnect($editUser);
    }
    
}
?>