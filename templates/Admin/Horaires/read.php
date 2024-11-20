<?php
require_once _ROOTPATH_.'/templates/Admin/Partial/_header.php';
?>
<h1>Races</h1>

<?php if(!isset($_GET['modify'])) {  ?>

<table class="table">
<a href="?controller=race&action=create" class="btn ">ajouter</a>
<?php
require_once _ROOTPATH_.'/templates/Admin/Partial/_btnadmin.php';
?>

    <thead>
    <tr>
    <th scope="col">#</th>
    <th scope="col">date</th>
    <th scope="col">ouverture</th>
    <th scope="col">fermeture</th>
   
    </tr>
    </thead>

    <tbody>
   
      <?php
      

      foreach($read as $reads) { ?>
        
      <tr>
          <td><?= $reads->getId(); ?></td>
          <td><?= $reads->getDate();?></td>
          <td><?= $reads->getHoraires();?></td>
          <td><?= $reads->getClose();?></td>
          
          <td><a href="?controller=race&action=update&modify=<?= $reads->getId(); ?>" class="btn ">update</a></td>
          
          <td><a href="?controller=horaires&action=delete&suprimer=<?= $reads->getId(); ?>" class="btn ">delete</a></td>
      </tr>
        <?php } ?>
        <a href="index.php" class="btn btn-danger">home</a>
        <?php } else { ?>

        <form action="" method="post">
            
            <input type="text" name="name"  />
            
            <input type="submit" class="btn btn-success"  />
            <a href="?controller=Race&action=read<?= $reads['id']; ?>" class="btn btn-danger">annuler</a>
        </form>
        
        <?php } ?>
        
    </tbody>
    
</table>


<?php
require_once _ROOTPATH_.'/templates/Admin/Partial/_footer.php';
?>




