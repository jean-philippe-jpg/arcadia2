<?php
require_once _ROOTPATH_.'/templates/Admin/Partial/_header.php';
?>
<h1>read</h1>

<table class="table">
    <thead>
    <tr>
    <th scope="col">#</th>
    <th scope="col">name</th>
    <th scope="col">description</th>
    <th scope="col">animals_list</th>
    <th scope="col">create</th>
    <th scope="col">update</th>
    <th scope="col">delete</th>
    <th scope="col">show</th>
    </tr>
    </thead>
    <tbody>
      <tr>
       <?php foreach($read as $key => $reads) { ?>
         <td><?= $reads->getName(); ?></td>
     
    <?php } ?>
       </tr>
      
    </tbody>
    
    

</table>


<?php
require_once _ROOTPATH_.'/templates/Admin/Partial/_footer.php';
?>




