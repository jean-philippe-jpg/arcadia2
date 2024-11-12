<?php if (isset($_GET['id'])  && !isset($_GET['isValid'])) { 
  require_once _ROOTPATH_.'/templates/Admin/Partial/_header.php';
  
  ?>
    
  <h4>show comments</h4>
  
<div class="show">
  
   <h5><?= $show->getPseudo() ?></h5>
   <h5><?= $show->getMessage() ?></h5>
   <a href="?controller=comments&action=isValid&isValid=<?= $show->getId()?>" class="btn">Validation</a>
  


</div>

<?php } else  { 
    
    require_once _ROOTPATH_.'/templates/Admin/Partial/_header.php';?>
 
  <div class="show">

<form action="" method="post">
<input type="text" value="true" name="isValid" style="visibility: hidden;">
<input type="submit" class="btn" value="Validé">
</form>

 
</div>
<?php } ?>

