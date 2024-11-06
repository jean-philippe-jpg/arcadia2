<?php

session_start();
//$name = $_SESSION['name'];
require_once _ROOTPATH_.'/templates/Admin/Partial/_header.php';
?>


<?php if(!isset($_GET['id'])){?>
    <h1>Users list</h1>
<table class="table">
<a href="?controller=habitats&action=read" class="btn ">habitats</a>
<a href="?controller=animals&action=read" class="btn ">animaux</a>
    <thead>
    <tr>
    <th scope="col">#</th>
    
    <th scope="col">email</th>
    <th scope="col">roles</th>
    
    </tr>
    </thead>
    
    <tbody>
  
      <?php foreach($users as $user) { ?>  
      <tr>
          <td><?= $user->getId(); ?></td>
          <td><?= $user->getEmail();?></td>
          <td><?= $user->getRoles();?></td>
          
       
          
            
            
         
          
          
          <td><a href="?controller=users&action=roles&r_soignant&id=<?= $user->getId(); ?>" class="btn btn-warning">roles_soignant</a></td>
          <td><a href="?controller=users&action=roles&id=<?= $user->getId(); ?>" class="btn btn-warning">roles_veto</a></td>
          <td><a href="?controller=race&action=show&show=<?= $user->getId(); ?>" class="btn btn-warning">voir</a></td>
          <td><a href="?controller=race&action=delete&suprimer=<?= $user->getId(); ?>" class="btn btn-danger">delete</a></td>
      </tr>
        <?php } ?>
        <a href="index.php" class="btn btn-danger">home</a>  
    </tbody>
    
</table>
<?php } else { ?>
   
    
    <h4>Confirmation des roles</h4>

    <form action="" method="post">
    <div>
    
    <input style="visibility: hidden;"  type="int" id="user_id" name="user_id" value="<?= $roles->getId(); ?>"/>
    </div>
    <div>
    
        <?php if(isset($_GET['r_soignant'])) { ?>
            <input style="visibility: hidden;" type="text" id="role_id" name="role_id" value="214 " />
        <?php } else { ?>
            <input style="visibility: hidden;" type="text" id="role_id" name="role_id" value="213" />
            
       <?php }?>
    
    </div>
    <?php if (isset($_GET['r_soignant'])) { ?>
    <input class="btn" type="submit" value="Soignant">
    <?php } else { ?>
        <input class="btn" type="submit" value="Veto">
   <?php } ?>
    
</form>
<a href="?controller=users&action=readusers" class="btn ">retour</a>
<?php } ?>



<?php
require_once _ROOTPATH_.'/templates/Admin/Partial/_footer.php';

/*if (!in_array('ROLE_ADMIN', $users->getRoles())) {
    echo 'vous n\'avez pas les droits';
    
}*/
?>




