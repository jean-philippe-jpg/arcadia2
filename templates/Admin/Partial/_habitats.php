


<?php foreach($habitat as $habitats){ ?>

<div class="card card_home" style="height: 50px; width:200px; background:blue;">
    <h2><?= $habitats->getName(); ?></h2>
    <img src="/uploads/<?=$habitats->getImg_hab() ?>" alt="" srcset="">
</div>

<?php } ?>