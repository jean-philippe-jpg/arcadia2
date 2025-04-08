<?php

require_once _ROOTPATH_.'/templates/Admin/Partial/_header.php';
?>

<a href="?controller=race&action=read" class="btn btn-success">retour</a>

<div class="form-create">
<form action="" method="post">

   
    <div class="create">
    <label for="jour"><strong>jours: </strong></label>
    <input name="jour" id="jour" type="text">
    </div>
    <div class="create">
    <label for="ouverture"><strong>ouvre à : </strong></label>
    <input name="ouverture" id="ouverture" type="time">
    </div>
    <div class="create">
    <label for="fermeture"><strong>ferme à: </strong></label>
    <input name="fermeture" id="fermeture" type="time">
    </div>
    
    <input type="submit" name="insert" value="create">

    
</form>
</div>

<?php
require_once _ROOTPATH_.'/templates/Admin/Partial/_footer.php';
?>




