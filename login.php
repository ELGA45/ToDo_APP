<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Logine</title>
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>
  <fieldset>
    <legend>LOGIN</legend>
    <form action="" method="post">
      <input type="email" name="email" placeholder="Votre email" required>
      <input type="password" name="mot_pass" placeholder="Entrer votre mot de pass" required>
      <button type="submit">Se connecter</button>
    </form>
    <?php
      if(isset($_GET['log']) && $_GET['log'] == 1){
        echo "<p>email ou mot de passe incorrect</p>";
      }
      if(isset($_GET['auth']) && $_GET['auth'] == 0 ){
        echo "<p>Merci de vous connecter</p>";
      }
    ?>
    <p><a href="register.php">Créer un compte</a></p>
  </fieldset>
</body>
</html>


<?php
  session_start();
  if($_SERVER['REQUEST_METHOD'] === 'POST'){
    extract($_POST);
    include 'config/user.php';

    /*try{
      $stmt = $pdo->query("SELECT * FROM users");
      $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    catch (PDOException $e) {
        echo "Erreur lors de la récupération des données : " . $e->getMessage();
    }

    $connected = false;
    foreach($users as $user){
      if($email == $user['email'] && $mot_pass == $user['mot_passe']){
        session_start();
        $_SESSION['userConnected'] = $user;
        header('Location:dashbord.php');
        $connected = true;
      }
    }
    if(!$connected){
        header('Location:login.php?log=1');
    }*/

    $emailUser = new Utilisateur();
    $users = $emailUser->ReadAll();

    $connected = false;
    foreach($users as $user){
      if($email == $user['email'] && $mot_pass == $user['mot_passe']){
        session_start();
        $_SESSION['userConnected'] = $user;
        header('Location:dashbord.php');
        $connected = true;
      }
    }
    if(!$connected){
        header('Location:login.php?log=1');
        exit();
    }
  }

  
