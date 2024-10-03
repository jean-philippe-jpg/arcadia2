<?php require_once _ROOTPATH_.'/templates/Admin/Partial/_header.php' ?>

<h1>show</h1>

<a href="?controller=Habitats&action=read" class="btn btn-success">retour</a>
<div class="show">

<p><strong>habitat:  </strong><?= $animals->getFirstName()?></p>
<p><strong>description:  </strong><?= $animals->getRace()?></p>



