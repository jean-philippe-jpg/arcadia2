
<h3>all soins</h3>

<?php

foreach ( $soins as $soin) { ?>
 

<div class="show"> 
<p><?= $soin->getFirstName() ?></p>
<p><?= $soin->getHabitat() ?></p>
<p><?= $soin->getNourriture() ?></p>
<p><?= $soin->getQuantitee() ?></p>
<p><?= $soin->getDate_heure() ?></p>

     
    
     
</div>
    
    
<?php } ?>