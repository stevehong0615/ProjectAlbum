<?php

class HomeController extends Controller {
    
    // 相簿首頁
    function index() {
        $sqlIndex = $this->model("SqlIndex");
        $data = $sqlIndex->indexSelect();
        
        $this->view("index", $data);
    }
    
    // 登入
    function login(){
        $this->view("login", $data);
        if(isset($_POST['button'])){
            $account = $_POST['account'];
            $pw = $_POST['pw'];
            $userInfo = $this->model("Guest");
            $result = $userInfo->sqlUser($account,$pw);
        
            if($result[0]['user_name'] != null){
                header("location:/ProjectAlbum/");
             }
            else{
                header("location:/ProjectAlbum/Home/login");
            }
        }
    }
    
    // 登出
    function logout(){
        session_destroy();
        header("location:/ProjectAlbum/");
    }
    
    // 註冊
    function register(){
        $this->view("register");
        if(isset($_POST['button'])){
            $account = $_POST['account'];
            $pw = $_POST['pw'];
            $pw2 = $_POST['pw2'];
            $nickname = $_POST['nickname'];
            
            if($account != null && $pw != null && $pw2 != null && $nickname != null && $pw == $pw2){
                $user = $this->model("Guest");
                $addUser = $user->sqlAddUser($account, $pw, $nickname);
                header("location:/ProjectAlbum/Home/login");
            }
            else{
                header("location:/ProjectAlbum/Home/register");
            }
        }
    }
    
    // 連絡站長
    function contact() {
        $this->view("contact");
    }
    
    // 會員中心
    function secret(){
        $account = $_SESSION['user_name'];
        $userInfo = $this->model("Guest");
        $result = $userInfo->sqlSecretUser($account);
        $this->view("secret", $result);
        
    }
    
    // 修改會員中心資料
    function editUser(){
        $username = $_SESSION['user_name'];
        //echo $username;
        $pw = $_POST['pw'];
        $pw2 = $_POST['pw2'];
        $nickname = $_POST['nickname'];
        
        if($pw != null && $pw2 != null && $nickname != null && $pw == $pw2){
            $editUserInfo = $this->model("Guest");
            $result = $editUserInfo->editUser($username, $pw, $nickname);
            header("location:/ProjectAlbum/Home/index");
        }
        else{
            header("location:/ProjectAlbum/Home/error");
        }
    }
    
    function error(){
        $this->view("error");
    }
    
}

?>