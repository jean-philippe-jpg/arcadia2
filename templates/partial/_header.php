<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/override-bootstrap.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Irish+Grover&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/habitats.css">
    <link rel="stylesheet" href="assets/css/animals_liste.css">
    <link rel="stylesheet" href="assets/css/home.css">
    <link rel="stylesheet" href="assets/css/dropdown.css">
   
   
</head>
<body>
   
<header >
          <a href="index.php" class=" title_zoo "  > ARCADIA</a>

  <nav>

  <ul >
      
      <li><a href="index.php" class="link-item">Accueil</a></li>
      <li><a href="?controller=services&action=readvisiteur" class="link-item">Services</a></li>
      <li><a href="?controller=habitats&action=readvisiteur" class="link-item">Habitats</a></li>
      <li><a href="?controller=users&action=connect" class="link-item">Connexion</a></li>
        <li><a href="?controller=contact&action=formcontact" class="link-item">Contact</a></li>
        <li><a  href="?controller=habitats&action=read" class="link-item">Admin</a></li>
       
      </ul>

  </nav>
     
  
     
 <section>
 <div class="dots" onclick="this.classList.toggle('active');">
  <div class="dot"></div>
  <div class="dot"></div>
  <div class="shadow cut"></div>
  <div class="container cut">
    <div class="drop cut2"></div>
  </div>
  <div class="list">
    <ul>
      <li>
      <a href="index.php" class="dropdown px-2">Accueil</a>
      </li>
      <li>
      <a href="?controller=services&action=readvisiteur" class="dropdown px-2">Services</a>
      </li>
      <li>
      <a href="?controller=habitats&action=readvisiteur" class="dropdown px-2">Habitats</a>
      </li>
      <li>
      <a href="?controller=users&action=connect" class="dropdown px-2">Connexion</a>
      </li>
      <li>
      <a href="?controller=contact&action=formcontact" class="dropdown px-2">Contact</a>
      </li>
    </ul>
  </div>
  <div class="dot"></div>
</div>
<div class="cursor"
     onclick="document.querySelector('.dots').classList.toggle('active');"></div>
    </header>
 </section>
  