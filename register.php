<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>
  <fieldset>
    <legend>Register</legend>
    <form action="" method="post">
      <input type="text" name="nom" placeholder="Votre nom" required>
      <input type="email" name="email" placeholder="Votre email" required>
      <input type="password" name="mot_pass" placeholder="Entrer votre mot de pass" required>
      <button type="submit">Enregistrer</button>
    </form>
    <?php
      if(isset($_GET['rgt']) && $_GET['rgt'] == 0){
        echo "<p>email existant</p>";
      }
      if(isset($_GET['rgt']) && $_GET['rgt'] == 1){
        echo "<p>Enregistrement reussi</p>";
      }
    ?>
    <p><a href="login.php">Se connecter</a></p>
  </fieldset>
</body>
</html>


<?php
  if($_SERVER['REQUEST_METHOD'] === 'POST'){
    extract($_POST);

    include 'config/user.php';

    $emailUser = new Utilisateur();
    $user = $emailUser->ReadByEmail($email);

    
    if($user && $email == $user['email']){
      header("Location:register.php?rgt=0");
      exit();
    }
    
    $utilisateur = new Utilisateur();
    $utilisateur->CreateUser($nom, $email, $mot_pass);
  }

  