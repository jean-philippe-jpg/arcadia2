<?php
require_once _ROOTPATH_.'/templates/Admin/Partial/_header.php'
?>

<h1>show</h1>

<a href="?controller=habitats&action=read" class="btn btn-success">retour</a>
<div class="show">

<h3><?= $habitat->getName()?></h3>
<p><strong>description:  </strong><?= $habitat->getDescription();?></p>


</div>


    
    

 





