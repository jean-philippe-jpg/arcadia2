<?php

require_once _ROOTPATH_.'/templates/partial/_header.php'; ?>


<?php if($errors){ ?>
<div class="alert alert-danger">
      <?= $errors?>

    

</div>

<?php }?>



<?php require_once _ROOTPATH_.'/templates/partial/_footer.php'; ?>