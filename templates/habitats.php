<?php
//require_once './bdd/connexion.php';
require_once './templates/partial/_header.php';
?>
<h3>Affichage des habitats</h3>

<?php foreach($habitat as $habitats) { ?>
    

    <a href="?controller=habitats&action=show&id=<?= $habitats->getId();?>"><?=$habitats->getName();?></a>

<?php }?>
<?php
require_once './templates/partial/_footer.php';
?>