<?php require_once _ROOTPATH_.'/templates/Admin/Partial/_header.php'; ?>
    <h3>roles users</h3>
    <form action="" method="post">
  <ul>
    
      <label for="user">User_id&nbsp;:</label>
      <input type="int" id="user" name="user" />
    </li>
    <li>
      <label for="role">Role:</label>
      <input type="int" id="role" name="role" />
    </li>
  </ul>

    <input type="submit" value="Envoyer">
</form>


<?php
require_once _ROOTPATH_.'/templates/Admin/Partial/_footer.php'; ?>