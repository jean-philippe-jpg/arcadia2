<?php
require_once _ROOTPATH_.'/templates/Admin/Partial/_header.php'
?>

<h1>show</h1>
<div class="show">
<p><strong>habitat:  </strong><?= $logement->getName();?></p>
<p><strong>description:  </strong><?= $logement->getDescription();?></p>
<p><strong>animaux:  </strong><?= $logement->getAnimalsList()?></p>


</div>






