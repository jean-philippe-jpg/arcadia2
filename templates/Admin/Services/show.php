<?php
require_once _ROOTPATH_.'/templates/Admin/Partial/_header.php';
?>
<h1>Races</h1>

<a href="?controller=services&action=read" class="btn btn-success">retour</a>
<div class="show">
  <h3>Service</h3>
<p><?= $services->getName()?></p>
<p><?= $services->getDescription()?></p>

<?php
require_once _ROOTPATH_.'/templates/Admin/Partial/_footer.php';
?>
