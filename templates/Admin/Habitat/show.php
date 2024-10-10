<?php
require_once _ROOTPATH_.'/templates/Admin/Partial/_header.php'
?>

<h1>show</h1>
<?php if(!isset($_GET['detailAnimal'])){ ?>
<a href="?controller=habitats&action=read" class="btn btn-success">retour</a>
<div class="show">

<p><strong>habitat:  </strong><?= $logement->getName()?></p>
<p><strong>description:  </strong><?= $logement->getDescription();?></p>
<strong>animaux:  </strong><a   href="?controller=habitats&action=show&detailAnimal=<?= $logement->getId()?>"><?= $logement->getAnimalsList()?></a>

</div>

<?php } else { ?>
 
    <div class="show">
<p><strong>Prenom:  </strong><?= $animal->getFirstName()?></p>
<p><strong>Race:  </strong><?= $animal->getNameRace();?></p>
<p><strong>Habitation:  </strong><?= $animal->getHabitat();?></p>
<p><strong>Etat:  </strong><?= $animal->getState();?></p>

</div>
<?php } ?>





