<?php require_once _ROOTPATH_.'/templates/Admin/Partial/_header.php'?>

<h1>show</h1>

<a href="index.php?controller=animals&action=read" class="btn btn-success">retour</a>
<div class="show">

<h3><?= $animals->getName();?></h3>
<p><?= $animals->getRace();?></p>

</div>



<?php
require_once _ROOTPATH_.'/templates/Admin/Partial/_footer.php';
?>
