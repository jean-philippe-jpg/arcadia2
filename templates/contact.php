<?php 

require_once _ROOTPATH_. '/templates/partial/_header.php';?>

<h1>contact</h1>
<div class="form_contact" >
<form action="" method="post">

<
    <label for="email">email</label>
    <input type="email" id="email" name="email">

    
    <label for="message">Message</label>
    <textarea name="message" id="message"></textarea>

    <input type="submit" name="Envoyer"  value="Envoyer">
</form>
</div>

 


<?php require_once _ROOTPATH_. '/templates/partial/_footer.php';?>