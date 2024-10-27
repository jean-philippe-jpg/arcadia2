<?php

session_start();
$name = $_SESSION['name'];
require_once _ROOTPATH_.'/templates/Admin/Partial/_header.php';
?>
<h1>Users List</h1>

<?php if(!isset($_GET['addroles'])){?>

<table class="table">
<a href="?controller=habitats&action=read" class="btn ">habitats</a>
<a href="?controller=animals&action=read" class="btn ">animaux</a>
    <thead>
    <tr>
    <th scope="col">#</th>
    <th scope="col">nom d'utilisateur</th>
    <th scope="col">email</th>
    <th scope="col">roles</th>
    
    </tr>
    </thead>
    
    <tbody>
  
      <?php foreach($users as $user) { ?>  
      <tr>
          <td><?= $user->getId(); ?></td>
          <td><?= $user->getUsername();?></td>
          <td><?= $user->getEmail();?></td>
          
            
            
         
          
          
          <td><a href="?controller=users&action=roles&addroles=<?= $user->getId(); ?>" class="btn btn-warning">roles</a></td>
          <td><a href="?controller=race&action=show&show=<?= $user->getId(); ?>" class="btn btn-warning">voir</a></td>
          <td><a href="?controller=race&action=delete&suprimer=<?= $user->getId(); ?>" class="btn btn-danger">delete</a></td>
      </tr>
        <?php } ?>
        <a href="index.php" class="btn btn-danger">home</a>  
    </tbody>
    
</table>
<?php } else { ?>
   
    
    
    <form action="" method="post">
    <div>
    
    <input style="visibility: hidden;" type="int" id="user_id" name="user_id" value="<?= $roles->getId(); ?>"/>
    </div>
    <div>
    <label for="name">Role:</label>
    <input type="text" id="role" name="name" />
    </div>
    <input class="btn" type="submit" value="Envoyer">
</form>
<a href="?controller=users&action=readusers" class="btn ">retour</a>
<?php } ?>



<?php
require_once _ROOTPATH_.'/templates/Admin/Partial/_footer.php';

/*if (!in_array('ROLE_ADMIN', $users->getRoles())) {
    echo 'vous n\'avez pas les droits';
    
}*/
?>




