<!DOCTYPE html>
<html lang="en">
<head>
    <?php require('layout.php'); ?>
</head>
<body>
    <div class="bg-content">       
  <!--============================== content =================================-->      
      <div id="content">
        <div class="container">
          <div class="row">
            <article class="span12">
            <br>
            <?php if ($sUserName == $_SESSION['user_name']): ?>
            <p><a href="upload.php">新增照片</a></p>
            <?php endif; ?>
            </article>
            <ul class="portfolio clearfix">
            
              <?php for($i = 0; $i < count($data['id']); $i++){ ?> 
              
              <li class="box"><a href="/ProjectAlbum/images/<?php echo $data['name'][$i]; ?>" class="magnifier" ><img alt="" src="/ProjectAlbum/images/<?php echo $data['name'][$i]; ?>"></a>
              <br><?php echo $data['comment'][$i]; ?><br>
              <?php if($sUserName != "Guest"){ ?>
              <?php echo "<button type='button' id='editbtn'  class = 'btn' onClick = 'SubmitFormEdit(" . $data['id'][$i] . ")' />編輯"; ?>
              <?php echo "<button type='button' id='deletebtn' class = 'btn' onClick = 'SubmitForm(" . $data['id'][$i] . ")' />刪除"; ?>
              <?php } ?>
              </li> 
              <?php } ?>
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
  
  
  // $('#editbtn').click(function(){
    
  //});
</script>
</body>
</html>