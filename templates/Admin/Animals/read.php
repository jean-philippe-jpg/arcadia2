<?php
require_once _ROOTPATH_.'/templates/Admin/Partial/_header.php';
?>
<h1>Animaux</h1>

<?php if(!isset($_GET['modify'])) {  ?>

<table class="table">
<a href="?controller=Animals&action=create" class="btn btn-success">ajouter</a>
<a href="?controller=Habitats&action=read" class="btn btn-warning">habitats</a>
<a href="?controller=Race&action=read" class="btn btn-warning">race</a>
    <thead>
    <tr>
    <th scope="col">#</th>
    <th scope="col">prenom</th>
    <th scope="col">race</th>
    
    <th scope="col">état</th>
    <th scope="col">update</th>
    <th scope="col">show</th>
    <th scope="col">delete</th>
    
    </tr>
    </thead>
    <tbody>
      <tr>

      
      <?php foreach($read as $reads) { ?>
        
      <tr>
          <td><?= $reads['id'] ?></td>
          <td><?= $reads['first_name']?></td>
          <td><?= $reads['namerace']?></td>
          
         
          <td>state</td>
          <td><a href="?controller=Animals&action=update&modify=<?= $reads['id']; ?>" class="btn btn-warning">update</a></td>
          <td><a href="?controller=Animals&action=show&show=<?= $reads['id']; ?>" class="btn btn-warning">voir</a></td>
          <td><a href="?controller=Animals&action=delete&suprimer=<?= $reads['id']; ?>" class="btn btn-danger">delete</a></td>
      </tr>
        <?php } ?>
        <?php } else { ?>

        <form action="" method="post">
            <input type="hidden" name="id" value="<?= $reads['id'] ?>" />
            <td><input type="text" name="name" value="<?= $reads['name'] ?>" /></td>
            <td><input type="text" name="race" value="<?= $read['habitat']?>" /></td>
            <td><input type="text" name="home" value="<?= $reads['home'] ?>" /></td>
           
            <td><a type="submit" class="btn btn-success">update</a></td>
            <td><a href="?controller=Habitats&action=read<?= $reads['id']; ?>" class="btn btn-danger">annuler</a></td>
        </form>
        
        <?php } ?>
        


           

       
        
     
  
  

 

    </tbody>
    
</table>


<?php
require_once _ROOTPATH_.'/templates/Admin/Partial/_footer.php';
?>




