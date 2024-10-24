<?php
session_start();

$username = $_SESSION['username'];


if (isset($_SESSION['username']) && $_SESSION['romain'] = true) {
    
     echo '<h1 style="color:purple;  text-align: center; margin-top: 30vh;">vous n\'avez pas l\'acces à cette page  :/</h1>';



} else {

require_once _ROOTPATH_.'/templates/Admin/Partial/_header.php';


echo 'bienvenue   '.$username;
?>


<h1>Races</h1>



<table class="table">
<a href="?controller=race&action=create" class="btn ">ajouter</a>
<?php
require_once _ROOTPATH_.'/templates/Admin/Partial/_button.php';
?>
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
          
          
          <td><a href="?controller=race&action=delete&suprimer=<?= $comment->getId(); ?>" class="btn ">delete</a></td>
          
          <td><form>
        <input type="checkbox" id="checkbox" name="scales"/>
        <label for="checkbox">Checkbox</label>
        </form></td>
          
      </tr>
      
        <?php } ?>
        
        <a href="index.php" class="btn btn-danger">home</a>
        

    </tbody>
    
</table>


<?php
require_once _ROOTPATH_.'/templates/Admin/Partial/_footer.php';

      }
?>


      

