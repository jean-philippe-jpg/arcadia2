<?php
require_once _ROOTPATH_.'/templates/Admin/Partial/_header.php'
?>

<h1>show</h1>

<a href="?controller=Habitats&action=read" class="btn btn-success">retour</a>
<div class="show">

<p><strong>habitat:  </strong><?= $logement['name']?></p>
<p><strong>description:  </strong><?= $logement['description']?></p>
<p><strong>animaux:  </strong><?= $logement['animals_list']?></p>


</div>






