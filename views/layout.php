<?php
if (isset($_GET["logout"]))
{
	unset($_SESSION['user_name']);
	header("Location: login.php");
	exit();
}

if (isset($_SESSION["user_name"]))
  $sUserName = $_SESSION["user_name"];
else 
  $sUserName = "Guest";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>臺灣寶島之美</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="/ProjectAlbum/css/bootstrap.css" type="text/css" media="screen">
	<link rel="stylesheet" href="/ProjectAlbum/css/responsive.css" type="text/css" media="screen">
	<link rel="stylesheet" href="/ProjectAlbum/css/style.css" type="text/css" media="screen">
	<link rel="stylesheet" href="/ProjectAlbum/css/touchTouch.css" type="text/css" media="screen">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="/ProjectAlbum/js/jquery.js"></script>
	<script type="text/javascript" src="/ProjectAlbum/js/superfish.js"></script>
    <script type="text/javascript" src="/ProjectAlbum/js/jquery.easing.1.3.js"></script>    
    <script type="text/javascript" src="/ProjectAlbum/js/touchTouch.jquery.js"></script> 
	<script type="text/javascript">if($(window).width()>1024){document.write("<"+"script src='/ProjectAlbum/js/jquery.preloader.js'></"+"script>");}	</script>
	<script>		
		jQuery(window).load(function() {	
		    $x = $(window).width();		
	        if($x > 1024)
    	    {			
	            jQuery("#content .row").preloader();    }			 
	        jQuery('.magnifier').touchTouch();
		    jQuery('.spinner').animate({'opacity':0},1000,'easeOutCubic',function (){jQuery(this).css('display','none')});	
  		}); 
	</script>
</head>

<body>
<div class="spinner"></div>
<!--============================== header =================================-->
<header>
    <div class="container clearfix">
      <div class="row">
        <div class="span12">
          <div class="navbar navbar_">
            <div class="container">
              <h1 class="brand brand_"><img alt="" src="/ProjectAlbum/img/logo.jpg"> </a></h1>
              <a class="btn btn-navbar btn-navbar_" data-toggle="collapse" data-target=".nav-collapse_">Menu <span class="icon-bar"></span> </a>
            <div class="nav-collapse nav-collapse_  collapse">
              <ul class="nav sf-menu">
                <li class="active"><a href="https://lab-stevehong0615.c9users.io/cakephp/Project/posts">首頁</a></li>
                <li><a href="/ProjectAlbum/Home/index">美景導覽</a></li>
                <li><a href="/ProjectAlbum/Home/contact">連絡站長</a></li>
                <?php if ($sUserName == "Guest"): ?>
                <li><a href="/ProjectAlbum/Home/login">登入</a></li>
                <?php else: ?>
                <li><a href="/ProjectAlbum/Home/secret">會員中心</a></li>
                <li><a href="/ProjectAlbum/Home/logout">登出</a></li>
                <?php endif; ?>
              </ul>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</header>
</body>
</html>