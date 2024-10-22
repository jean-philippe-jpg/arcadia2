<?php
require_once _ROOTPATH_.'/templates/Admin/Partial/_header.php';
?>
<h1>show avis habitat</h1>
<?php if(!isset($_GET['create'])) { 
 require_once _ROOTPATH_.'/templates/Admin/Partial/Veto/_animalsList.php';

  } elseif(isset($_GET['create'])) { ?>
        <h3>create avis animal</h3>

        <p>habitat:  </p>
      <form action="" method="post">
        <div>
        <label for="nourriture">Nourriture</label>
        <input type="text" name="nourriture" id="nourriture">
        </div>
        <div>
        <label for="quantitee">Quantitée</label>
        <input type="text" name="quantitee" id="quantitee">
        </div>
        <div>
        <label for="state">Etat</label>
        <input type="text"  name="state" id="state">
        </div>
        <div>
        <label for="detail">Detail</label>
        <input type="text"  name="detail" id="detail">
        </div>
        <div>
        <label for="animal">Aniaml</label>
        <input type="text" value="" name="animal" id="animal">
        </div>
        <div><
        <label for="date">Date de passage</label>
        <input type="date" name="date_de_passage" id="date">
        </div>
        
        <button type="submit">envoyer</button>
 <?php } ?>

<?php
require_once _ROOTPATH_.'/templates/Admin/Partial/_footer.php';
?>




