<div class="container">
<nav>
<input id="toggle" type="checkbox" checked>
<h2>date</h2>
<ul>

<?php foreach($animal as $animals){?>
<li><a href="?controller=admin&action=readadmin&vue=<?= $animals->getId(); ?>"><?= $animals->getDate_heure();?></a></li>
<?php } ?>

   
</ul>
</nav>
</div>
