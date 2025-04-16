
<div class="container">
<nav>
<input id="toggle" type="checkbox" checked>
<h2>Habitats</h2>
<ul>

<?php foreach($habitat as $habitats){?>
   
<li><a href="?controller=veto&action=habitats&create=<?= $habitats['id'] ?>"><?= $habitats['name']?></a></li>
<?php } ?>

   
</ul>
</nav>
</div>


