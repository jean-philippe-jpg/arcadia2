<?php
require_once _ROOTPATH_.'/templates/Admin/Partial/_header.php';
?>
<h1>Races</h1>

<a href="?controller=habitats&action=read" class="btn btn-success">retour</a>
<div class="show">

<p><strong>race:  </strong><?= $race->getName()?></p>

<?php
require_once _ROOTPATH_.'/templates/Admin/Partial/_footer.php';
?>




