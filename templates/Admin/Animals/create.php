<?php

require_once _ROOTPATH_.'/templates/Admin/Partial/_header.php';

if(!isset($_GET['photo'])) { ?>

<a href="?controller=animals&action=read" class="btn btn-success">retour</a>

<div class="form-create">
<form action="" method="post">

    <div class="create">
    <label for="name"><strong>prenom: </strong></label>
    <input name="name" id="name" type="text">
    </div>
    
    <div class="create">
    <label for="race"><strong>race:</strong> </label>
    <input name="race" id="race" type="text">
    </div>
    
    <div class="create">
    <label for="habitat_id"><strong>habitat:</strong> </label>
    <input name="habitat_id" id="habitat_id" type="text">
    </div>
  
   

   

    <input type="submit" name="insert" value="create">

    
</form>
</div>
<?php } else { ?>

    <h1>photo animals</h1>

    <?= $animals_id->getFirstName(); ?>
    <a href="?controller=animals&action=read" class="btn btn-success">retour</a>
    <div class="show">
        <form action="" method="post" enctype="multipart/form-data">

        
        <input style="visibility: hidden;" type="text" name="animals_id" id="animals_id" value="<?= $animals_id->getId(); ?>">
        <input type="file" name="images" id="images">
        <input type="submit" name="insert" value="create">
        </form>
        


    </div>
<?php
}
require_once _ROOTPATH_.'/templates/Admin/Partial/_footer.php';
?>




