<!DOCTYPE html>
<html lang="en">
<head>
	<title>臺灣寶島之美</title>
	<meta charset="utf-8">
	<?php $this->css('styleregister');?>
</head>
<body>
    <section class="register">
        <div class="titulo">會員中心</div>
            <form name="form" method="post" action="/ProjectAlbum/Home/editUser">
                <?php for($i = 0; $i < count($data['id']); $i++){ ?>
                    <p>帳號：<?php echo $data['user_name'][$i] ; ?></p><br>
                    <p>密碼：</p><input type="password" name="pw" value="<?php echo $data['password'][$i] ; ?>" /><br>
                    <p>再一次輸入密碼：</p><input type="password" name="pw2" value="<?php echo $data['password'][$i] ; ?>" /> <br>
                    <p>暱稱：</p><input type="text" name="nickname" value="<?php echo $data['nickname'][$i] ; ?>" /> <br><br>
                <?php } ?>
                <input class="enviar" type="submit" name="button" value="確定" />
            </form>
    </section>   
<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>