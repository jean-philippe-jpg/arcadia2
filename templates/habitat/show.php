<?php

require_once _ROOTPATH_.'/templates/partial/_header.php'; ?>


<h1>show</h1>

    <h2><?= $logement->getName();?></h2>
    <h2><?= $logement->getDescription();?></h2>
    <h3><?= $logement->getAnimalsList()?></h3>

 
    

<?php require_once _ROOTPATH_.'/templates/partial/_footer.php'; ?>



