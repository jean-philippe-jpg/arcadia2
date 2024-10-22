<?php

require_once _ROOTPATH_.'\templates\partial\_header.php';
?>

<h1>show animals</h1>


<?php if(isset($_GET['id'])) { ?>
<a href="?controller=habitats&action=read" class="btn btn-success">retour</a>
<div class="show">

<p><strong>habitat:  </strong><?= $logement->getName()?></p>
<p><strong>description:  </strong><?= $logement->getDescription();?></p>
<strong>animaux:  </strong><a   href="?controller=habitats&action=show&detailAnimal=<?= $logement->getId()?>"><?= $logement->getAnimalsList()?></a>

</div>
<?php } 
 elseif(isset($_GET['detailAnimal'])) { ?>


<div class="show">
<p><strong>Prenom:  </strong><?= $logement->getAnimalsList()?></p>
<p><strong>Race:  </strong><?= $logement->getRace()?></p>
<p><strong>Habitat:  </strong><?= $logement->getName()?></p>
<p><strong>Etat de <?= $logement->getAnimalsList() ?>:  </strong><?= $logement->getState()?></p>




</div>
<?php } ?>

<?php

require_once _ROOTPATH_.'\templates\partial\_footer.php';

?>