

            <?php if(!isset($_GET['entretient'])) {?>

                <div class="container">
     <nav>
      <input id="toggle" type="checkbox" checked>
     <h2>Animals Soignant</h2>
   <ul>

     <?php foreach($animals as $animal){?>
     <li><a href="?controller=veto&action=read&entretient="><?= $animal->getFirstName();?></a></li>
     <?php } ?>
   </ul>
</nav>
</div>

            <?php } else {?>
                <div class="show">

<p><strong>Prenom:  </strong><?= $animals->getFirstName()?></p>
<p><strong>Race:  </strong><?= $animals->getNameRace()?></p>
<p><strong>Habitat:  </strong><?= $animals->getHabitat()?></p>
<p><strong>Etat:  </strong><?= $animals->getState()?></p>
   <?php foreach($details as $detail) { ?>
<p><strong>Nourriture:  </strong><?= $detail->getNourriture()?></p>
<p><strong>Quantitee:  </strong><?= $detail->getQuantitee()?></p>
<p><strong>Date:  </strong><?= $detail->getDate_heure()?></p>

<?php } ?>
</div>

               

                <?php } ?>