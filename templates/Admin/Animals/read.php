<?php

session_start();

 $_SESSION['username'];


if (isset($_SESSION['username']) && $_SESSION['romain'] == false) {

  echo '<h1 style="color:purple;  text-align: center; margin-top: 30vh;">vous n\'avez pas l\'acces à cette page  :/</h1>';


} else {
require_once _ROOTPATH_.'/templates/Admin/Partial/_header.php';
?>
<h1>Animaux</h1>

<?php if(!isset($_GET['modify'])) {  ?>

<table class="table">
<a href="?controller=animals&action=create" class="btn btn-success">ajouter</a>
<?php
require_once _ROOTPATH_.'/templates/Admin/Partial/_btnadmin.php';
?>
<a href="index.php" class="btn btn-danger">home</a>
              <h3>salut</h3>
    <thead>
    <tr>
    <th scope="col">#</th>
    <th scope="col">prenom</th>
    <th scope="col">race</th>
    <th scope="col">habitat</th>
    <th scope="col">état</th>
    

    <th scope="col">update</th>
    <th scope="col">show</th>
    <th scope="col">delete</th>
    
    </tr>
    </thead>
    <tbody>
      <tr>

      
      <?php foreach($animal as $reads) { ?>
        
      <tr>
          <td><?= $reads->getId(); ?></td>
          <td><?= $reads->getFirstName();?></td>
          <td><?= $reads->getNameRace();?></td>
          <td><?= $reads->getHabitat();?></td>
          <td><?= $reads->getState();?></td>
          
          <td><a href="?controller=animals&action=update&modify=<?= $reads->getId(); ?>" class="btn btn-warning">update</a></td>
          <td><a href="?controller=animals&action=soins&id=<?= $reads->getId(); ?>" class="btn btn-warning">soins animal</a></td>
          <td><a href="?controller=animals&action=show&id=<?= $reads->getId(); ?>" class="btn btn-warning">voir</a></td>
          <td><a href="?controller=animals&action=delete&suprimer=<?= $reads->getId(); ?>" class="btn btn-danger">delete</a></td>
      </tr>
     

        <?php } ?>
     <?php } else { ?>

<form action="" method="post">
    <div>
    <label for="name">Name</label>
    <input type="text" id="name" name="name" >  
    </div>
    <br>
    <div>
    <label for="race">Race</label>
    <input type="number" id="race" name="race" >  
    </div>
    <br>
    <div>
    <label for="home">Habitat</label>
    <input type="number" id="home" name="home" >  
    </div>
    <br>
    <div>
    <label for="state">Etat</label>
    <input type="number" id="state" name="state" >  
    </div>
    <br>
    <div>
    
   <input type="submit"  class="btn btn-success"  value="Update">
    
</form>



</tbody>

</table>
<?php } ?>

<?php
require_once _ROOTPATH_.'/templates/Admin/Partial/_footer.php';

     }
?>




