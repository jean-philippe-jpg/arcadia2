<div class="container">
<nav>
<input id="toggle" type="checkbox" checked>
<h2>Animals</h2>
<ul>

<?php foreach($animal as $animals){?>
<li><a href="?controller=veto&action=create&id=<?= $animals['id']; ?>"><?= $animals['name'];?></a></li>
<?php } ?>

   
</ul>
</nav>
</div>
