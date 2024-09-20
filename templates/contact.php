<?php 

require_once _ROOTPATH_. '/templates/partial/_header.php';?>

<h1>contact</h1>

<form action="" method="post">
<label for="email">email</label>
    <input type="text" id="email" name="email">

    <label for="objet">Objet</label>
    <input type="text" id="objet" name="objet">

    <label for="message">Message</label>
    <textarea name="message" id="message"></textarea>

    <input type="submit" value="Envoyer">
</form>
 


<?php require_once _ROOTPATH_. '/templates/partial/_footer.php';?>