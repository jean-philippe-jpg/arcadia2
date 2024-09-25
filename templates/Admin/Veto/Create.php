<?php

require_once _ROOTPATH_.'/templates/Admin/Partial/_header.php';
?>
<h2>etablissement du rapport </h2>
<a href="?controller=habitats&action=read" class="btn btn-success">retour</a>

<div class="form-create">
<form action="" method="post">

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
    <label for="animal"><strong>Animal:</strong> </label>
    <input name="animal" id="animal" type="int">
    </div>

    <input type="submit" name="insert" value="create">

    
</form>
</div>

<?php
require_once _ROOTPATH_.'/templates/Admin/Partial/_footer.php';
?>




