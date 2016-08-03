<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once 'layout.php'; ?>
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
        <?php foreach($data as $key => $value): ?> 
          <img alt="" src="/ProjectAlbum/images/<?php echo $value['name']; ?>"><br>
          <form name="form" method="post" action="/ProjectAlbum/Image/editImage">
            <p>說明：<input type = "text" name = "comment" value = "<?php echo $value['comment']; ?>"></p><br>
            <input type = "hidden" name = "id" value = "<?php echo $value['id']; ?>">
        <?php endforeach; ?>
            <input type="submit" name="button" value="確定" />
          </form>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>