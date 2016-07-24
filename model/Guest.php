<?php

class Guest{
    function sqlUser($account){
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
        // var_dump($albumArray);
        // exit();
        return $userArray;
        
    }
}
?>