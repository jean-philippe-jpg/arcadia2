<div class="container">
<nav>
<input id="toggle" type="checkbox" checked>
<h2>Animals</h2>
<ul>

<?php foreach($animal as $animals){?>
<li><a href="?controller=veto&action=show&id=<?= $animals->getId(); ?>"><?= $animals->getAnimals_name();?></a></li>
<?php } ?>

   
</ul>
</nav>
</div>
