<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once 'layout.php'; ?>
</head>
<body>
<div class="bg-content" style="border: 1px ; padding: 30px">       
  <h3>新增照片</h3>
  <form action = "/ProjectAlbum/Image/upload/" method = "post" enctype = "multipart/form-data">
    <input type = "file" name = "UpPhoto[]"><br>
    <input type = "text" name = "Photo_Comment[]"><br>
    <input type = "file" name = "UpPhoto[]"><br>
    <input type = "text" name = "Photo_Comment[]"><br>
    <input type = "file" name = "UpPhoto[]"><br>
    <input type = "text" name = "Photo_Comment[]"><br>
    <input type = "submit" value = "送出">
  </form>
</div>
<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>