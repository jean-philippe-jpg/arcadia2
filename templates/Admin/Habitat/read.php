<?php
require_once _ROOTPATH_.'/templates/Admin/Partial/_header.php';
?>
<h1>Habitats</h1>
<?php if(!isset($_GET['modify'])) {  ?>
<table class="table">
<a href="?controller=habitats&action=create" class="btn btn-success">ajouter</a>
<a href="?controller=animals&action=read" class="btn btn-warning">animaux</a>
<a href="?controller=race&action=read" class="btn btn-warning">race</a>
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
      <tr>

      
      
      <?php foreach($read as $reads) { ?>
      <tr>
        
         <td><?= $reads['id']; ?></td>
          <td><?= $reads['name'];?></td>
          <td><?= $reads['description']; ?></td>
          <td><?= $reads['first_name'];?></td>
          
          <td><a href="?controller=habitats&action=update&modify=<?= $reads['id']; ?>" class="btn btn-warning">update</a></td>
          <td><a href="?controller=habitats&action=show&id=<?= $reads['id']; ?>" class="btn btn-warning">voir</a></td>
          <td><a href="?controller=habitats&action=delete&suprimer=<?= $reads['id']; ?>" class="btn btn-danger">delete</a></td>
      </tr>
        <?php } ?>
        <a href="index.php" class="btn btn-danger">home</a>
        <?php } else { ?>
             
            <form action="" method="post">
                <td><input type="text" name="name" value="<?= $reads['name'] ?>" /></td>
                <td><input type="text" name="description" value="<?= $reads['description'] ?>" /></td>
                <td><a type="submit" name"update" class="btn btn-success">update</a></td>
                
            </form>
        
        <?php } ?>
        


           

       
        
     
  
  

 

    </tbody>
    
</table>


<?php
require_once _ROOTPATH_.'/templates/Admin/Partial/_footer.php';
?>




