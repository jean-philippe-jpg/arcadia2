<?php

require_once _ROOTPATH_.'/templates/Admin/Partial/_header.php';
?>

<a href="?controller=race&action=read" class="btn btn-success">retour</a>

<div class="form-create">
<form action="" method="post">

    <div class="create">
    <label for="name"><strong>intitulé: </strong></label>
    <input name="name" id="name" type="text">
    </div>
    <div>
    <label for="description"><strong>description: </strong></label>
    <input name="description" id="description" type="text">
    
    </div>
   
    <input type="submit" name="insert" value="create">

    
</form>
</div>

<?php
require_once _ROOTPATH_.'/templates/Admin/Partial/_footer.php';
  
?>




