<?php

session_start();

//$_SESSION['username'];
if (isset($_SESSION['username']) && $_SESSION['romain'] == false) {

    echo '<h1 style="color:purple;  text-align: center; margin-top: 30vh;">vous n\'avez pas l\'acces à cette page  :/</h1>';
  
  
  } else {
require_once _ROOTPATH_.'/templates/Admin/Partial/_header.php';
?>
<h1>Liste des Services</h1>

<?php if(!isset($_GET['modify'])) {  ?>

<table class="table">
<a href="?controller=services&action=create" class="btn ">ajouter</a>
<?php
require_once _ROOTPATH_.'/templates/Admin/Partial/_btnadmin.php';
?>
    <thead>
    <tr>
    <th scope="col">#</th>
    <th scope="col">intitulé</th>
    <th scope="col">description</th>
    <th scope="col">update</th>
    <th scope="col">show</th>
    <th scope="col">delete</th>
    </tr>
    </thead>

    <tbody>
   
      <?php foreach($read as $reads) { ?>
        
      <tr>
          <td><?= $reads->getId(); ?></td>
          <td><?= $reads->getName();?></td>
          <td><?= $reads->getDescription();?></td>
          
          <td><a href="?controller=services&action=update&modify=<?= $reads->getId(); ?>" class="btn ">update</a></td>
          <td><a href="?controller=services&action=show&id=<?= $reads->getId(); ?>" class="btn ">voir</a></td>
          <td><a href="?controller=services&action=delete&suprimer=<?= $reads->getId(); ?>" class="btn ">delete</a></td>
      </tr>
        <?php } ?>
        <a href="index.php" class="btn btn-danger">home</a>
        <?php } else { ?>

        <form action="" method="post">
            
            <input type="text" name="name"  />
            <input type="text" name="description"  />
            
            <input type="submit" class="btn btn-success"  />
            <a href="?controller=Race&action=read<?= $reads['id']; ?>" class="btn btn-danger">annuler</a>
        </form>
        
        <?php } ?>
        
    </tbody>
    
</table>


<?php
require_once _ROOTPATH_.'/templates/Admin/Partial/_footer.php';
        }
?>




