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
                header("location:/ProjectAlbum/login");
            }
        }
        $this->view("login", $result);
    }
    
    function contact() {
        $this->view("contact");
    }
    
    function logout(){
        session_destroy();
        header("location:/ProjectAlbum/");
    }
    
}

?>