

<?php

require_once './templates/partial/_header.php';
require_once './templates/partial/_animals.php';
require_once './templates/partial/_habitatslist.php';
require_once './templates/partial/_services.php';
require_once './templates/partial/_animalsliste.php';

//$images = $this->readImages();

?>
<h1>Home</h1>



<h3>laisser un avis</h3>

<form action="" method="post">
    <label for="pseudo">pseudo</label>
    <input type="text" id="pseudo" name="pseudo" placeholder="indiquer votre pseudo">

    <label for="message">Message</label>
    <textarea name="message" id="message" placeholder="saisissez votre message"></textarea>

    <input type="submit" value="Envoyer">

</form>

  <h3>list des commantaires</h3>

  

    <?php  foreach($avis as $commentaire) { ?>
    
        <?php if( $_GET['isValid'] = true) { ?>

  <div style="margin-left: 10vw;">
  <i class="star">&#9733</i>
  <i class="star">&#9733</i>
  <i class="star">&#9733</i>
  <i class="star">&#9733</i>
  <i class="star">&#9733</i>
  <br>
  <strong><?= $commentaire->getPseudo(); ?></strong>
        <p><?=$commentaire->getMessage();?></p>
    
  </div>
    
  <?php } ?>

<?php } ?>


<?php
require_once './templates/partial/_presentation.php';
require_once './templates/partial/_footer.php';
?>