<!DOCTYPE html>
<html lang="en">
<head>
    <?php require('layout.php'); ?>
</head>
<body>
<div class="bg-content">       
  <div id="content">
    <div class="container">
      <div class="row">
        <article class="span12">
          <br>
          <h3>編輯照片</h3>  
        </article>
        <?php for($i = 0; $i < count($data['id']); $i++){ ?> 
          <img alt="" src="/ProjectAlbum/images/<?php echo $data['name'][$i]; ?>"><br>
          <form name="form" method="post" action="/ProjectAlbum/Image/editImage">
            <p>說明：<input type = "text" name = "comment" value = "<?php echo $data['comment'][$i]; ?>"></p><br>
            <input type = "hidden" name = "id" value = "<?php echo $data['id'][$i]; ?>">
        <?php } ?>
            <input type="submit" name="button" value="確定" />
          </form>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>