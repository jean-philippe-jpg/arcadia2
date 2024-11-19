<?php

require_once _ROOTPATH_.'\templates\partial\_header.php';
?>

<h1>show animals hab</h1>


<?php if(isset($_GET['id'])) { ?>
<a href="?controller=habitats&action=read" class="btn btn-success">retour</a>
<div class="show">

<p><strong>habitat:  </strong><?= $logement->getName();?></p>
<p><strong>description:  </strong><?= $logement->getDescription();?></p>

<a href="?controller=habitats&action=show&detailAnimal=<?= $logement->getAnimal_id(); ?>"><?= $logement->getName_animals();?></a>
</div>  

<?php } 
 elseif(isset($_GET['detailAnimal'])) { ?>


<div class="show">
<p><strong>Prenom:  </strong><?= $logement->getFirstName(); ?></p>
<p><strong>Race:  </strong><?= $logement->getNameRace(); ?></p>




</div>
<?php } ?>

<?php

require_once _ROOTPATH_.'\templates\partial\_footer.php';

?>