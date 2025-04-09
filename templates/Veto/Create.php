<?php

require_once _ROOTPATH_.'/templates/Admin/Partial/_header.php';
?>
<h2>etablissement du rapport </h2>
<a href="?controller=habitats&action=read" class="btn btn-success">retour</a>


<?php if(isset($_GET['id'])) { ?>
<div class="form-create">
<form action="" method="post">

<div class="create">

            <p style="color: red;"><strong><?= $animals->getName() ?></strong></p>
    <label for="animal"><strong>Aniaml: </strong></label>
    <input name="animal" id="animal" value="<?= $animals->getId() ?>" type="text">
    </div>
    
    <div class="create">
    <label for="nourriture"><strong>Nourriture: </strong></label>
    <input name="nourriture" id="nourriture" type="text">
    </div>
    
    <div class="create">
    <label for="quantitee"><strong>Quantitee:</strong> </label>
    <input name="quantitee" id="quantitee" type="text">
    </div>

    <div class="create">
    <label for="state"><strong>State:</strong> </label>
    <input name="state" id="state" type="text">
    </div>

    <div class="create">
    <label for="date_de_passage"><strong>Date de passage:</strong> </label>
    <input name="date_de_passage" id="date_de_passage" type="date">
    </div>

    <div class="create">
    <label for="detail"><strong>Detail:</strong> </label>
    <textarea name="detail" id="detail" cols="30" rows="10"></textarea>
    </div>
    
    <div class="create">
    <label for="observation"><strong>Observation:</strong> </label>
    <input name="observation" id="observation" type="text">
    </div>

    <input type="submit" name="insert" value="create">

    
</form>
</div>

<?php } else {

     require_once _ROOTPATH_.'/templates/Partial/_filteranimalstate.php';


} ?>

<?php
require_once _ROOTPATH_.'/templates/Admin/Partial/_footer.php';
?>




