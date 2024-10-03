<?php 

require_once './templates/Admin/Partial/_header.php'; ?>

<div class="form-create">
<form action="" method="post" enctype="multipart/form-data" >

    <div class="create">
    <label for="image"><strong>choisire une image: </strong></label>
    <input name="image" id="image" type="file">
    </div>
    <button type="submit" name="submit" class="btn btn-success">ajouter</button>
    
</form>
</div>


<?php  if (isset($_POST['submit'])) {
                   
                   // récupérer des informations sur notre image
                   $image_name = $_FILES['image']['name']; // nom de notre fichier
                   $image_tmp_name = $_FILES['image']['tmp_name']; // dossier temporaire
                   $image_error = $_FILES['image']['error']; // valeur d'erreur de notre image
                   if($image_error === 0 ) {
                   // Enregistrer l'image dans notre dossier uploads
                   $destination = "uploads".$image_name ; // uploads/1.png
                   move_uploaded_file($image_tmp_name, $destination);
                   echo " L'image a bien été enregistrée";}
                   else {
                   echo " Il y a eu une erreur lors du téléchargement de l'image";
                   }
               }

               ?>
<?php require_once './templates/Admin/Partial/_footer.php'; ?>