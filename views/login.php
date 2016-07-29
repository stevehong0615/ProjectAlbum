<!DOCTYPE html>
<html lang="en">
<head>
    <title>臺灣寶島之美</title>
	<meta charset="utf-8">
	<?php $this->css('stylelogin');?>
</head>
<body>
    <section class="login">
        <div class="titulo">會員登入</div>
        <form name="form" method="post" action="/ProjectAlbum/Home/login">
            <p>帳號：</p><input type="text" name="account" /> <br>
            <p>密碼：</p><input type="password" name="pw" /> <br>
            <div class="olvido">
                <div class="col"><a href="/ProjectAlbum/Home/register">註冊帳號</a></div>
                <div class="col"> <a href="/ProjectAlbum/Home/index">回相簿</a></div>
            </div>
            <input class="enviar" type="submit" name="button" value="登入" />
        </form>
    </section>   
</body>
</html>