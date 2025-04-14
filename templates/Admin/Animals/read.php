<?php

session_start();

if (!in_array('ROLE_ADMIN', $_SESSION['roles'])&& !in_array('ROLE_SOIGNANT', $_SESSION['roles'])) {

  echo '<h1 style="color:purple;  text-align: center; margin-top: 30vh;">vous n\'avez pas l\'acces à cette page  :/</h1>';


} else {
require_once _ROOTPATH_.'/templates/Admin/Partial/_header.php';





 if(!isset($_GET['modify'])) {  ?>

<table class="table">
<a href="?controller=animals&action=create" class="btn">ajouter</a>
<a href="?controller=users&action=connect" class="btn">profil</a>
        <a href="index.php" class="btn">home</a>
        
    <thead>
    <tr>
    <th scope="col">#</th>
    <th scope="col">prenom</th>
    <th scope="col">race</th>
    <th scope="col">habitat</th>
    <th scope="col">update</th>
    <?php if(in_array('ROLE_SOIGNANT', $_SESSION['roles']) && !in_array('ROLE_ADMIN', $_SESSION['roles']) && !in_array('ROLE_VETO', $_SESSION['roles'])) { ?>
    <th scope="col">soins</th>
    <?php } ?>
    <th scope="col">show</th>
    <th scope="col">photo</th>
    <th scope="col">delete</th>
    
    </tr>
    </thead>
    <tbody>
      <tr>
      <?php foreach($animal as $animals) { ?>
        
      <tr>
      <td><?= $animals->getId(); ?></td>
      <td><?= $animals->getName(); ?></td>
      <td><?= $animals->getRace(); ?></td>
      <td><?= $animals->getHabitat(); ?></td>
      
      
      
      
      
      
         
          
          <td><a href="?controller=animals&action=update&modify=<?= $animals->getId(); ?>" class="btn">update</a></td>
          <?php if(in_array('ROLE_SOIGNANT', $_SESSION['roles']) && !in_array('ROLE_ADMIN', $_SESSION['roles']) && !in_array('ROLE_VETO', $_SESSION['roles'])) { ?>
            <td><a href="?controller=animals&action=soins&id=<?= $animals->getId(); ?>" class="btn">soins animal</a></td>
          <?php }  ?>
            

          <td><a href="?controller=animals&action=show&id=<?= $animals->getId(); ?>" class="btn">voir</a></td>
          <td><a href="?controller=animals&action=create&photo&id=<?= $animals->getId(); ?>" class="btn">photo</a></td>
          <td><a href="?controller=animals&action=delete&suprimer=<?= $animals->getId(); ?>" class="btn">delete</a></td>
      </tr>
     

        <?php } 

       } else { ?>

<form action="" method="post">
    <div>
    <label for="name">Name</label>
    <input type="text" id="name" name="name" >  
    </div>
    <br>
    <div>
    <label for="race">Race</label>
    <input type="text" id="race" name="race" >  
    </div>
    <br>
    <div>
   <input type="submit"  class="btn "  value="Update">
    
</form>
</tbody>
</table>

      <?php }
require_once _ROOTPATH_.'/templates/Admin/Partial/_footer.php';
     }



