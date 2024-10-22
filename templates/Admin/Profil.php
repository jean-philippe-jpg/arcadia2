
<h3>page profil</h3>

<?php 

if(!isset($_GET['deconnexion'])){
   
session_start();

require_once _ROOTPATH_.'/templates/Admin/Partial/_header.php';
?>

<a href="?controller=profil&action=user&deconnexion"><i class="fa fa-power-off mt-2 fa-2x">toto</i></a>
       
<?php 

require_once _ROOTPATH_.'/templates/Admin/Partial/_footer.php';
}
else {

    session_start();
    $_SESSION = array();
    session_destroy();
    header('location:index.php');
    echo 'vous etes connecté';
}
?>

