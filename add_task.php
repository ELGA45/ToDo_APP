<?php
  session_start();
  if(isset($_SESSION['userConnected'])){
    $id_user = $_SESSION['userConnected']['id'];
?>

  <fieldset>
    <legend>Add_Task</legend>
    <form action="" method="post">
      <input type="text" name="titre" placeholder="Donner un titre" required>
      <input type="text" name="description" placeholder="La description" required>
      <input type="text" name="date_limite" placeholder="Donner le date limite" required>
      <input type="text" name="statut" placeholder="faite / non faite" required>
      <button type="submit">Ajouter</button>
    </form>
      <button><a href="dashbord.php">Liste des taches</a></button>
  </fieldset>

<?php
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
      extract($_POST);
      
      include 'config/db.php';

      try {
        $stmt = $pdo->prepare("INSERT INTO tasks VALUE(?,?,?,?,?,?)");
        $stmt->execute([NULL, $id_user, $titre, $description, $date_limite, $statut]);
        echo "Tache Ajouter avec succé";
      } catch (PDOException $e) {
        echo "Erreur lors de l'ajout : " . $e->getMessage();
      }
    }
  }
