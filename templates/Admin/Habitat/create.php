<?php

require_once _ROOTPATH_.'/templates/Admin/Partial/_header.php';
?>
<h1>create</h1>

<div class="form-create">
<form action="" method="post">
    <div class="create-nom-habitat">
    <label for="name"><strong>nom: </strong></label>
    <input name="name" id="name" type="text">
    </div>
    
    <div class="create-description-habitat">
    <label for="description"><strong>description:</strong> </label>
    <input name="description" id="description" type="text">
    </div>

    <input type="submit" name="insert" value="create">

    
</form>
</div>

<?php
require_once _ROOTPATH_.'/templates/Admin/Partial/_footer.php';
?>




