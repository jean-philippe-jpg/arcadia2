<?php
session_start();

var_dump($_SESSION);

//$_SESSION['username'];
//$_SESSION['roles'];


if (isset($_SESSION['username']) && $_SESSION['romain'] == false) {

    echo '<h1 style="color:purple;  text-align: center; margin-top: 30vh;">vous n\'avez pas l\'acces à cette page  :/</h1>';
  
  
  } else {
require_once _ROOTPATH_.'/templates/Admin/Partial/_header.php';
?>
<h1>Habitats</h1>

<?php try { ?>


<?php if(!isset($_GET['modify'])) {  ?>
<table class="table">
<a href="?controller=habitats&action=create" class="btn btn-success">ajouter</a>
<?php
require_once _ROOTPATH_.'/templates/Admin/Partial/_btnadmin.php';
?>
    <thead>
    <tr>
    <th scope="col">#</th>
    <th scope="col">name</th>
    <th scope="col">description</th>
    <th scope="col">animals_list</th>
    <th scope="col">update</th>
    <th scope="col">show</th>
    <th scope="col">delete</th>
    
    </tr>
    </thead>
    <tbody>

      <?php foreach($habitat as $habitats) { ?>
      <tr>
        
      <td><?= $habitats->getId(); ?></td>
         <td><?= $habitats->getName();?></td>
          <td><?= $habitats->getDescription(); ?></td>
          <td><?= $habitats->getAnimalsList(); ?></td>
           
        
          
          <td><a href="?controller=habitats&action=update&modify=<?= $habitats->getId(); ?>" class="btn btn-warning">update</a></td>
          <td><a href="?controller=habitats&action=show&id=<?= $habitats->getId(); ?>" class="btn btn-warning">voir</a></td>
          <td><a href="?controller=habitats&action=create&photo&id=<?= $habitats->getId(); ?>" class="btn btn-danger">photo</a></td>
          <td><a href="?controller=habitats&action=delete&suprimer=<?= $habitats->getId(); ?>" class="btn btn-danger">delete</a></td>
      </tr>
        <?php } ?>
        <a href="index.php" class="btn btn-danger">home</a>
        <?php } else { ?>

           
            <form action="" method="post">
                <div>
                <label for="name">Name</label>
                <input type="text" id="name" name="name" >  
                </div>
                <br>
                <div>
                <label for="description">Description</label>
                <input type="text" id="description" name="description" >  
                </div>
                <br>
                <div>
                <label for="animals">Animals</label>
                <input type="text" id="animals" name="animals" >  
                </div>
    
               <input type="submit"  class="btn btn-success" name="update" value="Update">
                
            </form>
           
        <?php } ?>
        

    </tbody>
    
</table>

<?php } catch (Exception $e) { 
    

    echo $e->getMessage();
    
} 
require_once _ROOTPATH_.'/templates/Admin/Partial/_footer.php';
  }
?>




