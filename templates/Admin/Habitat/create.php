<?php

require_once _ROOTPATH_.'/templates/Admin/Partial/_header.php';
?>
<h1>create</h1>
<a href="?controller=habitats&action=read" class="btn btn-success">retour</a>

<div class="form-create">
<form  method="POST" enctype="multipart/formdata" >

    <div class="create">
    <label for="name"><strong>nom: </strong></label>
    <input name="name" id="name" type="text">
    </div>
    
    <div class="create">
    <label for="description"><strong>description:</strong> </label>
    <input name="description" id="description" type="text">
    </div>

    <div class="create">
    <label for="animaux"><strong>animaux:</strong> </label>
    <input name="animals_list" id="animaux" type="text">
    </div>
   
    <input type="submit" name="insert" value="create">


<?php
require_once _ROOTPATH_.'/templates/Admin/Partial/_footer.php';
?>




