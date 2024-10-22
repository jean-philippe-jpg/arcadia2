<div class="container">
<nav>
<input id="toggle" type="checkbox" checked>
<h2>Animals</h2>
<ul>

<?php foreach($animal as $animals){?>
<li><a href="?controller=admin&action=readadmin&vue=<?= $animals->getId(); ?>"><?= $animals->getFirstName();?></a></li>
<?php } ?>

   
</ul>
</nav>
</div>
