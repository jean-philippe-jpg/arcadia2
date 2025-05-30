<?php
require_once _ROOTPATH_.'/templates/Admin/Partial/_header.php';
?>
<h3 style="color: red; margin-top:200px;">tableau etat animals</h3>

<?php //if(!in_array('ROLE_SOIGNANT', $user->getRoles())){ ?>
<?php if( !isset($_GET['modify']) && !isset($_GET['animalslist'])  && !isset($_GET['readsoins'])) {  ?>
<table class="table">
<a href="?controller=veto&action=create" class="btn btn-success">ajouter</a>
<a href="?controller=users&action=connect" class="btn btn-danger">profil</a>
 <a href="index.php" class="btn btn-danger">home</a>
    <thead>
    <tr>
    <th scope="col">#</th>
    <th scope="col">nourriture</th>
    <th scope="col">quantitée</th>
    <th scope="col">état</th>
    <th scope="col">detail</th>
    <th scope="col">animal</th>
    <th scope="col">date de passage</th>
    
    </tr>
    </thead>
    <tbody>
      <tr>
      <?php foreach($read as $reads) { ?>
      <tr>
        
         <td><?= $reads->getId_state(); ?></td>
          <td><?= $reads->getNourriture();?></td>
          <td><?= $reads->getQuantitee(); ?></td>
          <td><?= $reads->getState();?></td>
          <td><?= $reads->getDetail();?></td>
          <td><?= $reads->getAnimals();?></td>
          <td><?= $reads->getDate();?></td>
          
      
          
          
          <td><a href="?controller=veto&action=update&modify=<?= $reads->getId_state(); ?>" class="btn btn-warning">update</a></td>
          <td><a href="?controller=veto&action=show&id=<?= $reads->getId_state(); ?>" class="btn btn-warning">voir</a></td>
          
          <td><a href="?controller=veto&action=delete&suprimer=<?= $reads->getId(); ?>" class="btn btn-danger">delete</a></td>
      </tr>
      
        <?php } 

            } elseif (isset($_GET['animalslist'])){ ?>
           
           <a href="?controller=users&action=connect" class="btn btn-danger">profil</a>
           <a href="index.php" class="btn btn-danger">home</a>
          
               <?php require_once _ROOTPATH_.'/templates/Admin/Partial/Veto/_showSoins.php';


        } elseif (isset($_GET['readsoins'])) {

            
                require_once _ROOTPATH_.'/templates/Admin/Partial/Veto/_allSoins.php';

        } else { ?>
                      
            <form action="" method="post">
                <div>
                <label for="nourriture">Nourritures</label>
                <input type="text" id="nourriture" name="nourriture" >  
                </div>
                <br>
                <div>
                <label for="quantitee">Quantitee</label>
                <input type="text" id="quantitee" name="quantitee" >  
                </div>
                <br>
                <div>
                <label for="state">State</label>
                <input type="text" id="state" name="state" >  
                </div>
                <br>
                <label for="detail">Detail</label>
                <textarea name="detail" id="detail"></textarea>
                </div>
                <br>
                <label for="animal">Animals</label>
                <input type="text" id="animal" name="animal" >  
                </div>
                <br>
                <div>
                <label for="date">Date</label>
                <input type="date" id="date" name="date" >  
                </div>
                    
               <input type="submit"  class="btn btn-success" name="update" value="Update">
                
            </form>
           
        <?php } ?>

    </tbody>
    
</table>
        <?php //} ?>


<?php
require_once _ROOTPATH_.'/templates/Admin/Partial/_footer.php';

        
?>




