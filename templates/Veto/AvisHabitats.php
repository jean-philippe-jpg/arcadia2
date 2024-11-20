<?php
require_once _ROOTPATH_.'/templates/Admin/Partial/_header.php';
?>

<h1>show avis habitat</h1>


<?php if(!isset($_GET['create'])) { 
 require_once _ROOTPATH_.'/templates/Admin/Partial/_dropdownHabitats.php';

  } else  { ?>
        <h3>create avis home</h3>

       
      <form action="" method="post">
        <div>
        <label for="avis">Avis</label>
        <input type="text" name="avis" id="avis">
        </div>
        <div>
        <label for="etat">Etat</label>
        <input type="text" name="etat" id="etat">
        </div>
        <div>
        <label for="habitat_id">Habitat</label>
        <input type="number"  name="habitat_id" id="habitat_id">
        </div>
        
        <button type="submit">envoyer</button>
 <?php } ?>

<?php
require_once _ROOTPATH_.'/templates/Admin/Partial/_footer.php';
?>




