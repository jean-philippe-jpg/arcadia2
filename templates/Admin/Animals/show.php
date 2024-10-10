<?php require_once _ROOTPATH_.'/templates/Admin/Partial/_header.php' ?>

<h1>show</h1>

<a href="index.php?controller=animals&action=read" class="btn btn-success">retour</a>
<div class="show">

<p><strong>Prenom:  </strong><?= $animals->getFirstName()?></p>
<p><strong>Race:  </strong><?= $animals->getNameRace()?></p>
<p><strong>Habitat:  </strong><?= $animals->getHabitat()?></p>
<p><strong>Etat:  </strong><?= $animals->getState()?></p>
<p><strong>Nourriture:  </strong><?= $animals->getNourriture()?></p>
<p><strong>Quantitee:  </strong><?= $animals->getQuantitee()?></p>
<p><strong>Date:  </strong><?= $animals->getDate_heure()?></p>






