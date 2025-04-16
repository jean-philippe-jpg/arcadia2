<?php 
session_start();


if (!in_array('ROLE_SOIGNANT', $_SESSION['roles'])) {

  echo '<h1 style="color:purple;  text-align: center; margin-top: 30vh;">vous n\'avez pas l\'acces à cette page  :/</h1>';


} 
require_once _ROOTPATH_.'/templates/Admin/Partial/_header.php' ?>

<a href="?controller=users&action=connect" class="btn">profil</a>
<a href="index.php" class="btn btn-danger">home</a>       

<div class="show">

<h3><strong></strong><?= $soin->getName()?></h3>
<p><strong>Race: </strong><?= $soin->getRace()?></p>
<p><strong>Habitat:</strong><?= $soin->getHabitat()?></p>

<form action="" method="post">

    <div class="create">
    <label for="nourriture"><strong>Nourriture: </strong></label>
    <input name="nourriture" id="nourriture" type="text">
    </div>
    <div class="create">
    <label for="quantitee"><strong>Quantitée:</strong> </label>
    <input name="quantitee" id="quantitee" type="number">
    </div>
    <div class="create">
    <label for="date_heure"><strong>Date :</strong> </label>
    <input name="date_heure"  id="date_heure" type="<?= date("Y-m-d ")?>" value="<?= date("Y-m-d ")?>">
    </div>




   

    <div class="create">
    
    <input style="visibility: hidden;" name="animal" value="<?= $soin->getId();?>"  id="animal" type="number">
    </div>

    <input type="submit"  value="create">

   

    
</form>
  

</div>
