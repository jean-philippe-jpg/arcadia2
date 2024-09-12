<?php
require_once _ROOTPATH_.'/templates/Admin/Partial/_header.php';
?>
<h1>read</h1>

<table class="table">
    <thead>
    <tr>
    <th scope="col">#</th>
    <th scope="col">name</th>
    <th scope="col">description</th>
    <th scope="col">animals_list</th>
    <th scope="col">create</th>
    <th scope="col">update</th>
    <th scope="col">delete</th>
    <th scope="col">show</th>
    </tr>
    </thead>
    <tbody>
      <tr>


      <?php foreach( $read as  $reads ) { ?>
      <?php if(!isset($_GET['modify']) || $_GET['modify'] !==$_GET['id']){ ?>  
      <tr>
          <td><?= $reads->getId(); ?></td>
          <td><?= $reads->getName();?></td>
          <td><?= $reads->getDescription(); ?></td>
          <td><a href="?controller=Habitats&action=update&modify=<?= $reads->getId(); ?>" class="btn btn-warning">update</a></td>
          <td><a href="?controller=Habitats&action=delete&suprimer=<?= $reads->getId(); ?>" class="btn btn-danger">delete</a></td>
      </tr>
        <?php  } else {  ?>


        <form action="" method="post">

        <input type="hidden" name="id" value="<?= $reads['id']?>" />
<td><?= $reads['id'] ?></td>
<td><input type="text" name="name" value="<?=$reads['name'] ?>"/></td>
<td><input type="text" name="description" value="<?=$reads['description'] ?>"/></td>
<td><input type="submit" class="btn btn-success" value="valider"/></td>
<td><a href="?controller=Habitats&action=read " class="btn btn-danger">annuler</a></td>

        
        </form>
        
        <?php } ?>
        <?php } ?>
     
  
  

 

    </tbody>
    
</table>


<?php
require_once _ROOTPATH_.'/templates/Admin/Partial/_footer.php';
?>




