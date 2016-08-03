<?php

class Guest extends Connect{
    
    function sqlUser($account,$pw){
        // 搜尋users_table資料表中使用者名稱的資料
        $user = $this->db->prepare("SELECT `user_name` FROM `users_table` WHERE `user_name` = :username AND `password` = :password ");
        $user->bindParam(':username', $account);
        $user->bindParam(':password', $pw);
        $user->execute();
        $result = $user->fetchAll(PDO::FETCH_ASSOC);
        
        if($result[0]['user_name'] != null){
            $_SESSION['user_name'] = $result[0]['user_name'];
        }
        return $result;
        
    }
    
    // 新增user
    function sqlAddUser($account, $pw, $nickname){
        $this->db->query("INSERT INTO `users_table` (`user_name`, `password`, `nickname`) VALUES ('$account', '$pw', '$nickname')");
        return true;
    }
    
    // 抓取SESSION名稱的資料
    function sqlSecretUser(){
        $account = $_SESSION['user_name'];
        $userAccount = $this->db->query("SELECT * FROM `users_table` WHERE `user_name` = '$account'");
        $result = $userAccount->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    
    // 編輯會員資料
    function editUser($username, $pw, $nickname){
        $username = $_SESSION['user_name'];
        $this->db->query("UPDATE `users_table` SET `password` = '$pw', `nickname` = '$nickname' WHERE `user_name` = '$username'");
        return true;
    }
    
    // 刪除SESSION
    function deleteSession(){
        session_destroy();
        return true;
    }
    
}
?>