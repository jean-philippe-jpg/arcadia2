<?php

require_once _ROOTPATH_.'/templates/Admin/Partial/_header.php';

if(!isset($_GET['photo'])) { ?>

<a href="?controller=animals&action=read" class="btn btn-success">retour</a>

<div class="form-create">
<form action="" method="post">

    <div class="create">
    <label for="name"><strong>prenom: </strong></label>
    <input name="name" id="name" type="text" >

    </div>
    
    <div class="create">
   
    <label for="race"><strong>race:</strong> </label>
    <select name="race" id="race">
        <?php foreach($races as $race) { ?>
            <option value="<?= $race->getId(); ?>"><?= $race->getName(); ?></option>
        <?php } ?>
    </select>
    </div>
    
    <div class="create">
    <label for="habitat_id"><strong>habitat:</strong> </label>
    <select  id="habitat_id" name="habitat_id">
        <?php foreach($habitats as $habitat) { ?>
            <option name="habitat_id" value="<?= $habitat['id']; ?>"><?= $habitat['name']; ?></option>
        <?php } ?>
    </select>
    </div>
    <input type="submit" name="insert"> 
</form>
</div>
<?php } elseif (isset($_GET['photo'])) { ?>

    <h1>photo animals</h1>

   
    <a href="?controller=animals&action=read" class="btn btn-success">retour</a>
    <div class="show">
        
        <form action="" method="post" enctype="multipart/form-data">
        <input type="text" name="animals_id" id="images" value="<?= $animals_id['name']; ?>">
        <input type="file" name="images" id="images">
        <input type="submit" name="insert" value="create">

        </form>
    
    </div>
<?php
}
require_once _ROOTPATH_.'/templates/Admin/Partial/_footer.php';
?>




