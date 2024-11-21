<?php
//session_start();
 
 //var_dump($_SESSION);
 $email = $_SESSION['email'] = $_POST['email'];
  $_SESSION['roles_user'] = $user;
  
 
 


require_once _ROOTPATH_.'/templates/Admin/Partial/_header.php';

?>
  
<h1>Connexion</h1>
<h5><?= $email ?></h5>

				// condition test pour récupérer les roles //
       				<?php if(isset($_SESSION['roles_user']) && $_SESSION['ROLE_ADMIN'] == true ) { 

                           echo 'vous etes admin';

                       } else {
                           echo 'erreur de session';
                        } ?>
                      




<a href="https://front.codes/" class="logo" target="_blank">
		<img src="https://assets.codepen.io/1462889/fcy.png" alt="">
	</a>

	<form action="" method="post">
  <ul>
    
    <li>
      <label for="email">E-mail&nbsp;:</label>
      <input type="email" id="email" name="email" />
    </li>
    <li>
      <label for="password">Password&nbsp;:</label>
      <input id="text" name="password"></input>
    </li>
  </ul>

    <input type="submit" value="Envoyer" />
</form>

<a href="?controller=veto&action=read">rapport veto</a>

<?php

require_once _ROOTPATH_.'/templates/Admin/Partial/_footer.php';

/*if($_SERVER['REQUEST_METHOD'] === 'POST') {
	
	$email =  $_POST['email'];
	 $password =  $_POST['password'];
	//$_SESSION['password'] = $_POST['password'];

	

	if($email === 'jphilippe.champion@gmail.com' && $password === 'root') {

		//initiation de notre session

		$_SESSION['root'] = true;

		// definition du cooki

		setcookie('role', 'admin', time() + 3600, '/');

		//redirection

		header('location:?controller=users&action=connect');



	}
	/*if($username === 'gégé') {

		//initiation de notre session
	
		$_SESSION['gégé'] = true;
	
		// definition du cooki
	
		setcookie('user', 'gégé', time() + 3600, '/');
	
		//redirection
	
		header('location:?controller=users&action=profil');
	
	
	
	}*/






?>



