<?php
  session_start();
  if(isset($_SESSION['userConnected'])){
    $id_user = $_SESSION['userConnected']['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add_task</title>
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>
  <fieldset>
    <legend>Add_Task</legend>
    <form action="" method="post">
      <input type="text" name="titre" placeholder="Donner un titre" required>
      <input type="text" name="description" placeholder="La description" required>
      <input type="date" name="date_limite" placeholder="Donner le date limite" required>
      <button type="submit">Ajouter</button>
    </form>
      <button><a href="dashbord.php">Liste des taches</a></button>
  </fieldset>
</body>
</html>

<?php
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
      extract($_POST);
      
      include 'config/db.php';

      try {
        $stmt = $pdo->prepare("INSERT INTO tasks(user_id, titre, description, date_limite) VALUE(?,?,?,?)");
        $stmt->execute([$id_user, $titre, $description, $date_limite]);
        echo "Tache Ajouter avec succé";
      } catch (PDOException $e) {
        echo "Erreur lors de l'ajout : " . $e->getMessage();
      }
    }
  }
