<?php
require_once _ROOTPATH_.'/templates/Admin/Partial/_header.php';
?>
<h1>Races</h1>



<table class="table">
<a href="?controller=race&action=create" class="btn ">ajouter</a>
<a href="?controller=habitats&action=read" class="btn ">habitats</a>
<a href="?controller=animals&action=read" class="btn ">animaux</a>
<a href="?controller=comments&action=read" class="btn ">commentaires</a>
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
        
       
        

    </tbody>
    
</table>


<?php
require_once _ROOTPATH_.'/templates/Admin/Partial/_footer.php';
?>




