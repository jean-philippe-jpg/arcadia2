<?php
require_once _ROOTPATH_.'/templates/Admin/Partial/_header.php';
?>
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
?>



