<?php
session_start();


if (!in_array('ROLE_ADMIN', $_SESSION['roles'])) {

  echo '<h1 style="color:purple;  text-align: center; margin-top: 30vh;">vous n\'avez pas l\'acces à cette page  :/</h1>';
} else {

require_once _ROOTPATH_.'/templates/Admin/Partial/_header.php';
?>
<h1>Habitats</h1>

<?php if(!isset($_GET['modify'])) {  ?>
<table class="table">
<a href="?controller=habitats&action=create" class="btn btn-success">ajouter</a>
<a href="?controller=users&action=connect" class="btn btn-danger">profil</a>
        <a href="index.php" class="btn btn-danger">home</a>
       
    <thead>
    <tr>
    <th scope="col">#</th>
    <th scope="col">name</th>
    <th scope="col">animals_list</th>
    <th scope="col">images</th>
    <th scope="col">update</th>
    <th scope="col">show</th>
    <th scope="col">photo</th>
    <th scope="col">delete</th>
    
    </tr>
    </thead>
    <tbody>
   
      <?php foreach($habitat as $habitats) { ?>
      <tr>
       
    
         <td><?= $habitats['name'];?></td>
          <td><?= $habitats['animals']; ?></td>
          
          <td><img src="/uploads/<?= $habitats['photo']; ?>" width="150" height="150"></td>
          
          <td><a href="?controller=habitats&action=update&modify=<?= $habitats['id']; ?>" class="btn btn-warning">update</a></td>
          <td><a href="?controller=habitats&action=view&id=<?=  $habitats['id'];  ?>" class="btn btn-warning">voir</a></td>
          <td><a href="?controller=habitats&action=create&photo&id=<?=  $habitats['id'];  ?>" class="btn btn-danger">photo</a></td>
          <td><a href="?controller=habitats&action=delete&suprimer=<?=  $habitats['id'];  ?>" class="btn btn-danger">delete</a></td>
          
      </tr>
       <?php 
       } ?>

   <?php } else {?>

            <form action="" method="post">
                
                <br>
                <div>
                <label for="description">Description</label>
                <input type="text" id="description" name="description" >  
                </div>
                <br>
             
               <input type="submit"  class="btn btn-success" name="update" value="Update">
                
            </form>
           
        <?php } ?>
        

    </tbody>
    
</table>

<?php
require_once _ROOTPATH_.'/templates/Admin/Partial/_footer.php';
    }
