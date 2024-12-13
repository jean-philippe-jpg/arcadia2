


<?php 
if (empty($_SESSION['roles']) )  {


} else {

if(in_array('ROLE_ADMIN', $_SESSION['roles']) ) { ?>

<a href="?controller=users&action=register" class="btn ">inscription</a>
<a href="?controller=habitats&action=read" class="btn btn-warning">habitats</a>
<a href="?controller=services&action=read" class="btn ">services</a>
<a href="?controller=admin&action=readadmin&filtres" class="btn ">show all veto_state</a>
<a href="?controller=animals&action=read" class="btn btn-warning">animaux</a>
<a href="?controller=race&action=read" class="btn btn-warning">race</a>


<?php } elseif (in_array('ROLE_SOIGNANT', $_SESSION['roles'])) { ?>

    <a href="?controller=comments&action=read" class="btn ">avis</a>
    <a href="?controller=services&action=read" class="btn ">services</a>
    <a href="?controller=rapportsoignant&action=soins&soignant" class="btn ">soins </a>


<?php } elseif (in_array('ROLE_VETO', $_SESSION['roles'])) { ?>

    <a href="?controller=veto&action=create" class="btn "> rapport </a>
    <a href="?controller=veto&action=habitats" class="btn "> avis habitats </a>
    <a href="?controller=veto&action=read&animalslist" class="btn "> show soins </a>
    <a href="#" class="btn "> show soins </a>

 <?php }
 } ?>
