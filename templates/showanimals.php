<?php

require_once _ROOTPATH_.'/templates/partial/_header.php';
//require_once '/templates/partial/_header.php';
?>

<h1>show animals hab</h1>


<?php if(isset($_GET['id'])) { ?>
<a href="?controller=habitats&action=read" class="btn btn-success">retour</a>
<div class="show">

<p><strong>habitat:  </strong><?= $habitat->getName();?></p>
<p><strong>description:  </strong><?= $habitat->getDescription();?></p>

<?php foreach($animals as $animal) { ?>
<a href="?controller=habitats&action=show&detailAnimal=<?= $animal->getId(); ?>"><?= $animal->getName();?></a>
<?php } ?>
</div>  
     

<?php } 
 elseif(isset($_GET['detailAnimal'])) { ?>

<div class="show">
<?php try{ ?>

    
    
        <p><strong>Prenom:  </strong><?= $animal['name']; ?></p>
<p><strong>Race:  </strong><?= $animal['race']; ?></p>
<?php if($animal['state'] == null){ ?>
<p><strong>etat:  </strong><?= $animal['state'] = 'n/c'; ?></p>
<p><strong>detail:  </strong><?= $animal['detail'] = 'n/c'; ?></p>
<?php } else { ?>
        <p><strong>etat:  </strong><?= $animal['state'] ; ?></p>
<p><strong>detail:  </strong><?= $animal['detail']; ?></p>
<?php } ?>
        
   
 <?php }catch(\Exception $e){
    echo 'erreur de lecture'. $e->getMessage();
  }
 } ?>



</div>
 

<?php

require_once _ROOTPATH_.'\templates\partial\_footer.php';

