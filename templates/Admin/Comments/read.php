<?php


$_SESSION['roles'] = ['ROLE_SOIGNANT']; // Simulating roles for testing

if(!in_array('ROLE_SOIGNANT', $_SESSION['roles']) ) {

    echo '<h1 style="color:purple;  text-align: center; margin-top: 30vh;">vous n\'avez pas l\'acces à cette page  :/</h1>';
    
  
  } else {
require_once _ROOTPATH_.'/templates/Admin/Partial/_header.php';

?>


<h1>Commentaires</h1>



<table class="table">

<a href="?controller=users&action=connect" class="btn btn-danger">profil</a>
<a href="index.php" class="btn btn-danger">home</a>

    <thead>
    <tr>
    <th scope="col">#</th>
    <th scope="col">pseudo</th>
    <th scope="col">message</th>
    <th scope="col">check</th>
    <th scope="col">delete</th>
    </tr>
    </thead>

    <tbody>
   
      <?php foreach($comments as $comment) { ?>
        
      <tr>
          <td><?= $comment->getId(); ?></td>
          <td><?= $comment->getPseudo();?></td>
          <td><?= $comment->getMessage();?></td>
          
          
          <td><a href="?controller=comments&action=delete&suprimer=<?= $comment->getId(); ?>" class="btn ">delete</a></td>
          <td><a href="?controller=comments&action=show&id=<?= $comment->getId(); ?>" class="btn ">moderation</a></td>
         
          
      </tr>
      
        <?php } ?>
        
    </tbody>
    
</table>


<?php
require_once _ROOTPATH_.'/templates/Admin/Partial/_footer.php';
      }
      
?>



      

