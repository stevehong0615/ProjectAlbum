<?php

class HomeController extends Controller {
    
    function index() {
        $this->model("SqlIndex");
        $indexInfo = new SqlIndex();
        $result = $indexInfo->sqlIndex();
        $this->view("index", $result);
    }
    
    function login(){
        $account = $_POST['account'];
        $pw = $_POST['pw'];
        $userInfo = $this->model("Guest");
        
        $result = $userInfo->sqlUser($account);
        //print_r($result);
        
        if(isset($account)){
            if($account != null && $pw != null && $result['user_name'][0] == $account && $result['password'][0] == $pw){
                //將帳號寫入session
                $_SESSION['user_name'] = $account;
                header("location:/ProjectAlbum/");
            }
            else
            {
                header("location:/ProjectAlbum/Home/login");
            }
        }
        $this->view("login", $result);
    }
    
    function logout(){
        session_destroy();
        header("location:/ProjectAlbum/");
    }
    
    function register(){
        $this->view("register");
        $account = $_POST['account'];
        $pw = $_POST['pw'];
        $pw2 = $_POST['pw2'];
        $nickname = $_POST['nickname'];
        
        if($account != null && $pw != null && $pw2 != null && $nickname != null && $pw == $pw2){
        $this->model("Guest");
        $user = new Guest();
        $addUser = $user->sqlAddUser($account, $pw, $nickname);
        header("location:/ProjectAlbum/Home/login");
        }
    }
    
    function contact() {
        $this->view("contact");
    }
    
    function addPhoto(){
        $this->view("addPhoto");
    }
    
    function secret(){
        $account = $_SESSION['user_name'];
        $userInfo = $this->model("Guest");
        $result = $userInfo->sqlSecretUser($account);
        $this->view("secret", $result);
        
    }
    
    function editUser(){
        $username = $_SESSION['user_name'];
        //echo $username;
        $pw = $_POST['pw'];
        $pw2 = $_POST['pw2'];
        $nickname = $_POST['nickname'];
        
        if($pw != null && $pw2 != null && $nickname != null && $pw == $pw2){
            $this->model("Guest");
            $editUserInfo = new Guest();
            $result = $editUserInfo->editUser($username, $pw, $nickname);
            header("location:/ProjectAlbum/Home/index");
        }
    }
    
}

?>