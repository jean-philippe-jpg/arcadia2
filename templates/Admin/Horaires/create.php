<?php

require_once _ROOTPATH_.'/templates/Admin/Partial/_header.php';
?>

<a href="?controller=race&action=read" class="btn btn-success">retour</a>

<div class="form-create">
<form action="" method="post">

   
    <div class="create">
    <label for="jours"><strong>jours: </strong></label>
    <input name="date" id="jours" type="text">
    </div>
    <div class="create">
    <label for="horaire"><strong>ouvre à : </strong></label>
    <input name="horaires" id="name" type="time">
    </div>
    <div class="create">
    <label for="close"><strong>ferme à: </strong></label>
    <input name="close" id="close" type="time">
    </div>
    
    <input type="submit" name="insert" value="create">

    
</form>
</div>

<?php
require_once _ROOTPATH_.'/templates/Admin/Partial/_footer.php';
?>




