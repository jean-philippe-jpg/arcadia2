<?php
require_once _ROOTPATH_.'/templates/Admin/Partial/_header.php'
?>

<h1>show</h1>

<a href="?controller=habitats&action=read" class="btn btn-success">retour</a>
<div class="show">

<p><strong>habitat:  </strong><?= $logement->getName()?></p>
<p><strong>description:  </strong><?= $logement->getDescription();?></p>
<strong>animaux:  </strong><a   href="?controller=habitats&action=show&detailAnimal=<?= $logement->getId()?>"><?= $logement->getName_animals(); ?></a>

</div>


    
    

 





