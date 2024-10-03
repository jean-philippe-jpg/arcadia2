<?php

require_once _ROOTPATH_.'/templates/Admin/Partial/_header.php';
?>

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
    <label for="home"><strong>habitat:</strong> </label>
    <input name="home" id="home" type="text">
    </div>
    <div class="create">
    <label for="state"><strong>state:</strong> </label>
    <input name="state" id="state" type="text">
    </div>

   

    <input type="submit" name="insert" value="create">

    
</form>
</div>

<?php
require_once _ROOTPATH_.'/templates/Admin/Partial/_footer.php';
?>




