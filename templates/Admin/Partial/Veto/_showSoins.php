<div class="container">
    <nav>
    <input id="toggle" type="checkbox" checked>
    <h2>Liste des animeaux</h2>
    <ul>
    
    <?php foreach($animal as $animals){ ?>
    <li><a href="?controller=veto&action=read&readsoins=<?= $animals->getId() ?>"><?= $animals->getFirstName();?></a></li>
    <?php } ?>
    
    </ul>
    </nav>
    </div>


 
