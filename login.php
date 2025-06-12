<fieldset>
  <legend>LOGIN</legend>
  <form action="" method="post">
    <input type="email" name="email" placeholder="Votre email" require>
    <input type="password" name="mot_pass" placeholder="Entrer votre mot de pass" require>
    <button type="submit">Se connecter</button>
  </form>
  <?php
    if(isset($_GET['log']) && $_GET['log'] == 1){
      echo "<p>email ou mot de passe incorrect</p>";
    }
  ?>
  <p><a href="register.php">Créer un compte</a></p>
</fieldset>

<?php
  if($_SERVER['REQUEST_METHOD'] === 'POST'){
    extract($_POST);
    include 'config/db.php';

    try{
      $stmt = $pdo->query("SELECT * FROM users");
      $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    catch (PDOException $e) {
        echo "Erreur lors de la récupération des données : " . $e->getMessage();
    }

    foreach($users as $user){
      if($email == $user['email'] && $mot_pass == $user['mot_passe']){
        session_start();
        $_SESSION['userconnected'] = $user;
        echo "pppp";
      }
      else{
        header("Location:login.php?log=1");
      }
    }
  }
