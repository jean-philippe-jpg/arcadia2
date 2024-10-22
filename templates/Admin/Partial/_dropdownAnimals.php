

            <?php if(isset($_GET['soignant'])) {?>

                <div class="container">
     <nav>
      <input id="toggle" type="checkbox" checked>
     <h2>Animals Soignant</h2>
   <ul>

     <?php foreach($animals as $animal){?>
     <li><a href="?controller=rapportsoignant&action=soins&id=<?= $animal->getId() ?>"><?= $animal->getFirstName();?></a></li>
     <?php } ?>
   </ul>
</nav>
</div>
            <?php } else { ?>
                <h3>hello</h3>

<div class="show">

<p><strong>Prenom:  </strong><?= $animals->getFirstName()?></p>
<p><strong>Race:  </strong><?= $animals->getNameRace()?></p>
<p><strong>Habitat:  </strong><?= $animals->getHabitat()?></p>
<p><strong>Etat:  </strong><?= $animals->getState()?></p>
<?php foreach($details as $detail) { ?>
<p><strong>Nourriture:  </strong><?= $detail->getNourriture()?></p>
<p><strong>Quantitee:  </strong><?= $detail->getQuantitee()?></p>
<p><strong>Date:  </strong><?= $detail->getDate_heure()?></p>
</div>
           <?php } ?>
<?php } ?>
