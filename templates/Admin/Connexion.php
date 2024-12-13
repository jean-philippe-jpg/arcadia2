<?php

//if (empty($_SESSION['email'])) {



//} else {
	//$email = $_SESSION['email'] = $_POST['email'];
//}

 //$password = $_SESSION['password'] = $_POST['password'];

require_once _ROOTPATH_.'/templates/Admin/Partial/_header.php';

?>
  
<h1>Connexion</h1>


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
require_once _ROOTPATH_.'/templates/Admin/Partial/_acces.php';



/*if($_SERVER['REQUEST_METHOD'] === 'POST') {
	
	
		$email =  $_POST['email'];
		$password =  $_POST['password'];

	if($email === 'gege@hotmail.com' && $password = 'gege') {
	
		//initiation de notre session
		$_SESSION['gege@hotmail.com'] = true;
		 //definition du cooki

		setcookie('gege@hotmail.com', 'admin', time() + 3600, '/');

		//redirection

		header('location:?controller=users&action=profil');



	}

	

require_once _ROOTPATH_.'/templates/Admin/Partial/_footer.php';


	//if($email === true) {

		//initiation de notre session
	
		$_SESSION['email'] = true;
	
		// definition du cooki
	
		setcookie('user', 'gégé', time() + 3600, '/');
	
		//redirection
	
		header('location:?controller=users&action=profil');
	
	
	}*/
	//}






?>



