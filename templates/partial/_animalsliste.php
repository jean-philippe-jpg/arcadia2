<?php foreach($animal as $animals){ ?>

<div class="card card_home" style="height: 50px; width:200px; background:blue;">
    <h2><?= $animals->getFirstName(); ?></h2>
</div>



<?php } ?>