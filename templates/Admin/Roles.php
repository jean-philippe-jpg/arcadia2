<?php require_once _ROOTPATH_.'/templates/Admin/Partial/_header.php'; ?>
    <h3>roles users</h3>
    <form action="" method="post">
  <ul>
    
      <label for="name">Role:</label>
      <input type="int" id="name" name="name" />
    </li>
    <li>
      <label for="user_id">User:</label>
      <input type="text" id="user_id" name="user_id" />
    </li>
  </ul>

    <input type="submit" value="Envoyer">
</form>


<?php
require_once _ROOTPATH_.'/templates/Admin/Partial/_footer.php'; ?>