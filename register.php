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

<?php
  if($_SERVER['REQUEST_METHOD'] === 'POST'){
    extract($_POST);

    include 'config/db.php';

    $stmt = $pdo->query("SELECT * FROM users");
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach($users as $user){
      if($email == $user['email']){
        header("Location:register.php?rgt=0");
      }
    }

    try{
      $stmt = $pdo->prepare("INSERT INTO users VALUE(?,?,?,?)");
      $stmt->execute([NULL,$nom,$email,$mot_pass]);
      header("Location:register.php?rgt=1");
    }
    catch(PDOException $e){
      echo "Erreur lors de l'enragistrement : " . $e->getMessage();
    }
  }