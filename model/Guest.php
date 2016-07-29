<?php

class Guest extends Connect{
    
    function sqlUser($account,$pw){
        // 搜尋users_table資料表定使用者名稱的資料
        $user = $this->db->query("SELECT `user_name` FROM `users_table` where `user_name` = '".$account."'AND password='".$pw."'");
        $result = $user->fetchAll(PDO::FETCH_ASSOC);
        
        if($result[0]['user_name'] != null){
            $_SESSION['user_name'] = $result[0]['user_name'];
        }
        return $result;
        
    }
    
    // 新增user
    function sqlAddUser($account, $pw, $nickname){
        $this->db->query("INSERT INTO `users_table` (`user_name`, `password`, `nickname`) VALUES ('$account', '$pw', '$nickname')");
        return;
    }
    
    // 抓取SESSION名稱的資料
    function sqlSecretUser($account){
        $userAccount = $this->db->query("SELECT * FROM `users_table` where `user_name` = '$account'");
        $result = $userAccount->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    
    // 編輯會員資料
    function editUser($username, $pw, $nickname){
        $this->db->query("UPDATE `users_table` SET `password` = '$pw', `nickname` = '$nickname' where `user_name` = '$username'");
        return;
    }
    
}
?>