<?php

require_once _ROOTPATH_.'/templates/Admin/Partial/_header.php';
?>


<?php if(!isset($_GET['photo'])) { ?>
<h1>create</h1>

<a href="?controller=habitats&action=read" class="btn btn-success">retour</a>

<div class="form-create">

<form  action=""  method="POST" >

    <div class="create">
    <label for="name"><strong>nom: </strong></label>
    <input name="name" id="name" type="text">
    </div>
    
    <div class="create">
    <label for="description"><strong>description:</strong> </label>
    <input name="description" id="description" type="text">
    </div>

    <div class="create">
    <label for="animaux"><strong>animaux:</strong> </label>
    <input name="animals_list" id="animaux" type="text">
    </div>
    <div class="create">
    <label for="state"><strong>état:</strong> </label>
    <input name="state" id="state" type="number">
    </div>
    
    <input type="submit" name="insert" value="create">
<?php } else { ?>


    <?= $hab_id->getId(); ?>

    <h1>photo</h1>
  

<a href="?controller=habitats&action=read" class="btn btn-success">retour</a>
<div class="show">
<form action="" method="post"  enctype="multipart/form-data">
<label for="habitat_id">habitat</label>
<input type="text" name="habitat_id" id="habitat_id" value="<?= $hab_id->getId(); ?>">

<input type="file" name="images"/>

<input type="submit" name="insert" value="create">
</form>

</div>


<?php
}
require_once _ROOTPATH_.'/templates/Admin/Partial/_footer.php';
?>




