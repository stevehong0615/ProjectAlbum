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
            <?php if ($sUserName == $_SESSION['user_name']): ?>
              <p><a href="/ProjectAlbum/Image/addPhoto">新增照片</a></p>
            <?php endif; ?>
            </article>
            <ul class="portfolio clearfix">
              <?php foreach($data as $key=>$value): ?>
                <li class="box"><a href="/ProjectAlbum/images/<?php echo $value['name']; ?>" class="magnifier" ><img alt="" src="/ProjectAlbum/images/<?php echo $value['name']; ?>"></a>
                <br><?php echo $value['comment']; ?><br>
                <?php if($sUserName != "Guest"): ?>
                  <?php echo "<button type='button' id='editbtn'  class = 'btn' onClick = 'SubmitFormEdit(" . $value['id'] . ")' />編輯"; ?>
                  <?php echo "<button type='button' id='deletebtn' class = 'btn' onClick = 'SubmitForm(" . $value['id'] . ")' />刪除"; ?>
                <?php endif; ?>
                </li> 
              <?php endforeach; ?>
              <form action = "/ProjectAlbum/Image/conImage" method = "post">
                <input name = "edit" type = "hidden" id = "edit"></input>
                <input name = "delete" type = "hidden" id="delete" ></input>
              </form>
            </ul>
          </div>
        </div>
      </div>
    </div>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script>
  function SubmitForm(id){
    $("#delete").val(id);
    $("form").submit();
  }
  
  function SubmitFormEdit(id){
    $("#edit").val(id);
    $("form").submit();
  }
</script>
</body>
</html>