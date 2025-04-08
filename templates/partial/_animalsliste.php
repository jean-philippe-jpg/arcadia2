

<div class="toto">
<div class="img_animals">

<div class="msg-animaux">

<p class="irish-grover-regular text-animals scroller"><strong>Bienvenue à arcadia</strong><br><strong> Venez découvrir les animaux fantastique vous laissant des souvenir innoubliable!!</strong><br><strong>
    <p class="fin-text irish-grover-regular">partez à la rencontre des</p>
</strong></p>


<?php foreach($animal as $animals){ ?>

    <div class="cards_animals">

        <ul>
        <li class="irish-grover-regular"><strong><?= $animals->getRace(); ?></strong></li>
        </ul>
    
    </div>

<?php } ?>
</div>
</div>
</div>