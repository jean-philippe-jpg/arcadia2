
<h3>all soins</h3>

<?php


foreach ( $soins as $soin) { ?>

<div class="show"> 

<h2><?= $soin->getName() ?></h2>
<p><?= $soin->getHabitat() ?></p>
<p><?= $soin->getNourriture() ?></p>
<p><?= $soin->getQuantitee() ?> Kg</p>
<p><?= $soin->getDate() ?></p>

</div>
    
    
<?php } ?>