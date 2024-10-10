<?php
//require_once './bdd/connexion.php';
require_once './templates/partial/_header.php';
?>
<h3>Affichage des services</h3>

<?php foreach($service as $services) { ?>
    

    <b><?=$services->getName();?></b>
    <p><?=$services->getDescription();?></p>

<?php }?>
<?php
require_once './templates/partial/_footer.php';
?>