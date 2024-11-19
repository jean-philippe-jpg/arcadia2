<?php
require_once _ROOTPATH_.'/templates/Admin/Partial/_header.php'
?>

<h3>show rapprt de santé</h3>

<a href="?controller=veto&action=read" class="btn btn-success">retour</a>

<div class="show">
<p><strong>date:  </strong><?= $show->getAnimals_name();?></p>
<p><strong>Nourriture:  </strong><?= $show->getNourriture();?></p>
<p><strong>Quantitée:  </strong><?= $show->getQuantitee();?></p>
<p><strong>Etat:  </strong><?= $show->getState()?></p>
<p><strong>Detail:  </strong><?= $show->getDetail();?></p>
<p><strong>date:  </strong><?= $show->getDate();?></p>


</div>






