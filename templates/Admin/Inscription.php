
<?php
session_start();




if(!in_array('ROLE_ADMIN', $_SESSION['roles']) ) {

  echo '<h1 style="color:purple;  text-align: center; margin-top: 30vh;">vous n\'avez pas l\'acces à cette page  :/</h1>';
  

} else {

  require_once _ROOTPATH_.'/templates/Admin/Partial/_header.php';
?>
<a href="?controller=users&action=connect" class="btn btn-danger">profil</a>
<a href="index.php" class="btn btn-danger">home</a>
<h1>Inscription</h1>


<form action="" method="post">
  <ul>
      <li>
      <label for="email">E-mail&nbsp;:</label>
      <input type="email" id="email" name="email" />
    </li>
   
    
    <li>
      <label for="password">Password&nbsp;:</label>
      <input id="text" name="password"></input>
    </li>
    
  </ul>

    <input type="submit" value="Envoyer">
</form>

<?php
require_once _ROOTPATH_.'/templates/Admin/Partial/_footer.php';
}
?>

