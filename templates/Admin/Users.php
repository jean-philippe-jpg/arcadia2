<?php
require_once _ROOTPATH_.'/templates/Admin/Partial/_header.php';
?>
<h1>Races</h1>

<?php if(!isset($_GET['modify'])) {  ?>

<table class="table">
<a href="?controller=race&action=create" class="btn btn-success">ajouter</a>
<a href="?controller=habitats&action=read" class="btn btn-warning">habitats</a>
<a href="?controller=animals&action=read" class="btn btn-warning">animaux</a>
    <thead>
    <tr>
    <th scope="col">#</th>
    <th scope="col">nom d'utilisateur</th>
    <th scope="col">email</th>
    <th scope="col">mot de passe</th>
    
    </tr>
    </thead>

    <tbody>
   
      <?php foreach($users as $user) { ?>
        
      <tr>
          <td><?= $reads->getId(); ?></td>
          <td><?= $reads->getUsername();?></td>
          <td><?= $reads->getEmail();?></td>
          
          
          <td><a href="?controller=race&action=update&modify=<?= $user->getId(); ?>" class="btn btn-warning">update</a></td>
          <td><a href="?controller=race&action=show&show=<?= $user->getId(); ?>" class="btn btn-warning">voir</a></td>
          <td><a href="?controller=race&action=delete&suprimer=<?= $user->getId(); ?>" class="btn btn-danger">delete</a></td>
      </tr>
        <?php } ?>
        <a href="index.php" class="btn btn-danger">home</a>
        <?php } else { ?>

        <form action="" method="post">
            
            <input type="text" name="name"  />
            
            <input type="submit" class="btn btn-success"  />
            <a href="?controller=users&action=read<?= $users->getId(); ?>" class="btn btn-danger">retour</a>
        </form>
        
        <?php } ?>
        
    </tbody>
    
</table>


<?php
require_once _ROOTPATH_.'/templates/Admin/Partial/_footer.php';
?>




