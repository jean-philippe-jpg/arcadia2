<?php
session_start();

if(!in_array('ROLE_ADMIN', $_SESSION['roles']) ) {

    echo '<h1 style="color:purple;  text-align: center; margin-top: 30vh;">vous n\'avez pas l\'acces à cette page  :/</h1>';
    
  
  } else {
require_once _ROOTPATH_.'/templates/Admin/Partial/_header.php';
?>
<h1>Horaires</h1>

<?php if(!isset($_GET['modify'])) {  ?>

<table class="table">
<a href="?controller=horaires&action=create" class="btn ">ajouter</a>
<a href="?controller=users&action=connect" class="btn btn-danger">profil</a>
<a href="index.php" class="btn btn-danger">home</a>

    <thead>
    <tr>
    <th scope="col">#</th>
    <th scope="col">jour</th>
    <th scope="col">ouverture</th>
    <th scope="col">fermeture</th>
   
    </tr>
    </thead>

    <tbody>
   
      <?php
      

      foreach($read as $reads) { ?>
        
      <tr>
          <td><?= $reads->getId(); ?></td>
          <td><?= $reads->getJour();?></td>
          <td><?= $reads->getOuverture();?></td>
          <td><?= $reads->getFermeture();?></td>
          
          <td><a href="?controller=horaires&action=update&modify=<?= $reads->getId(); ?>" class="btn ">update</a></td>
          
          <td><a href="?controller=horaires&action=delete&suprimer=<?= $reads->getId(); ?>" class="btn ">delete</a></td>
      </tr>
        <?php } 
       } else { ?>

        <form action="" method="post">
            
        <label for="ouverture">Ouverture</label>
        <input type="time" id="ouverture" name="ouverture" >  

        <label for="fermeture">Fermeture</label>
        <input type="time" id="fermeture" name="fermeture" > 

            <input type="submit" class="btn btn-success"  />
            <a href="?controller=horaires&action=read" class="btn btn-danger">annuler</a>
        </form>
        
        <?php } ?>
        
    </tbody>
    
</table>


<?php
require_once _ROOTPATH_.'/templates/Admin/Partial/_footer.php';
        }
?>




