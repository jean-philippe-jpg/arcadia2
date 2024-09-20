<?php
require_once _ROOTPATH_.'/templates/Admin/Partial/_header.php';
?>
<h1>Habitats</h1>
<?php if(!isset($_GET['users'])) {  ?>
<table class="table">
<a href="?controller=Habitats&action=create" class="btn btn-success">ajouter</a>
<a href="?controller=Animals&action=read" class="btn btn-warning">animaux</a>
<a href="?controller=Race&action=read" class="btn btn-warning">race</a>
    <thead>
    <tr>
    <th scope="col">#</th>
    <th scope="col">username</th>
    <th scope="col">email</th>
    <th scope="col">roles</th>

    </tr>
    </thead>
    <tbody>
      <tr>

      
      
    
             
           
        <?php } ?>
        


           

       
        
     
  
  

 

    </tbody>
    
</table>


<?php
require_once _ROOTPATH_.'/templates/Admin/Partial/_footer.php';
?>




