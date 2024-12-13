

<?php

require_once './templates/partial/_header.php';
require_once './templates/partial/_habitatslist.php';
require_once './templates/partial/_animalsliste.php';
require_once './templates/partial/_presentation.php';
require_once './templates/partial/_services.php'; 
?>
<div class="form_comments">
<form action="" method="post">
    <label for="pseudo">pseudo</label>
    <input type="text" id="pseudo" name="pseudo" placeholder="indiquer votre pseudo">

    <label for="message">Message</label>
    <textarea name="message" id="message" placeholder="saisissez votre message"></textarea>

    <input type="submit" value="Envoyer">

</form>
</div>



<div class="comments_liste">
    <?php  foreach($avis as $commantaire) { ?>
    
        <?php if($commantaire->getIsValid() == true) { ?>

  <div style="margin-left: 10vw;">

 <?php  for($i = 0; $i < 5; $i++) { ?>
  <i class="star">&#9733</i>
  <?php } ?>
  <br>
  <strong><?= $commantaire->getPseudo(); ?></strong>
        <p><?= $commantaire->getMessage();?></p>
    
  </div>

    
  <?php } ?>
    
<?php } ?>

</div>

<?php
require_once './templates/partial/_footer.php';
?>