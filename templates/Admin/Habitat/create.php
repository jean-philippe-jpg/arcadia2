<?php
require_once _ROOTPATH_.'/Repository/HabitatsRepository.php';
require_once _ROOTPATH_.'/templates/Admin/Partial/_header.php';
?>
<h1>create</h1>

<div class="form-create">
<form action="/App/Repository/HabitatsRepository.php" method="POST">
    <div class="create-nom-habitat">
    <label for="name"><strong>nom: </strong></label>
    <input name="name" id="nom" type="text">
    </div>
    
    <div class="create-description-habitat">
    <label for="description"><strong>description:</strong> </label>
    <input name="description" id="description" type="text">
    </div>

    <button style="margin-top: 20px;" type="submit" class="btn btn-success" name="insert">Create</button>

    
</form>
</div>

<?php
require_once _ROOTPATH_.'/templates/Admin/Partial/_footer.php';
?>




