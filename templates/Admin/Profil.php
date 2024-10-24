
<h3>page profil</h3>

<?php 

if(!isset($_GET['deconnexion'])){
   
session_start();
$username = $_SESSION['username'];
require_once _ROOTPATH_.'/templates/Admin/Partial/_header.php';
?>


       <p>bonjour <?= $username ?></p> 
<a href="?controller=profil&action=user&deconnexion"><i class="fa fa-power-off mt-2 fa-2x">deconnexion</i></a>
       
<?php 

require_once _ROOTPATH_.'/templates/Admin/Partial/_footer.php';
}
else {

    session_start();
    $_SESSION = array();
    session_destroy();
    header('location:index.php');
    echo 'deconnecter';
}
?>

