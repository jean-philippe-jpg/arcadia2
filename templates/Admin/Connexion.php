<?php
session_start();

 var_dump($_SESSION);

//echo $user->getUsername();

require_once _ROOTPATH_.'/templates/Admin/Partial/_header.php';

//require_once './App/Entity/Users.php';
?>
  
<h1>Connexion</h1>



<a href="https://front.codes/" class="logo" target="_blank">
		<img src="https://assets.codepen.io/1462889/fcy.png" alt="">
	</a>

	<form action="" method="post">
  <ul>
    <li>
      <label for="username">Username&nbsp;:</label>
      <input type="text" id="username" name="username" />
    </li>
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

if($_SERVER['REQUEST_METHOD'] === 'POST') {
	$username = $_SESSION['username'] = $_POST['username'];
	$email = $_SESSION['email'] = $_POST['email'];
	$roles =  $_SESSION['roles'] = [];
	$_SESSION['password'] = $_POST['password'];

	

	if($username === 'romain') {

		//initiation de notre session

		$_SESSION['romain'] = true;

		// definition du cooki

		setcookie('username', 'romain', time() + 3600, '/');

		//redirection

		header('location:?controller=users&action=profil');



	}
	if($username === 'gégé') {

		//initiation de notre session
	
		$_SESSION['gégé'] = true;
	
		// definition du cooki
	
		setcookie('user', 'gégé', time() + 3600, '/');
	
		//redirection
	
		header('location:?controller=users&action=profil');
	
	
	
	}
	

}



?>



