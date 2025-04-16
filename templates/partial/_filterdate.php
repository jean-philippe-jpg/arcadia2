<div class="container">
<nav>
<input id="toggle" type="checkbox" checked>
<h2>date</h2>
<ul>

<?php foreach($animal as $animals){?>
<li><a href="?controller=veto&action=show&id=<?= $animals->getId(); ?>"><?= $animals->getDate();?></a></li>
<?php } ?>

   
</ul>
</nav>
</div>
