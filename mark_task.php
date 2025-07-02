<?php
  session_start();
  if(isset($_SESSION['userConnected']) && isset($_GET['id'])){
    include 'config/db.php';
    $stmt = $pdo->query("SELECT * FROM tasks
                        WHERE id = ".$_GET['id']."");
    $statut = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<fieldset>
    <legend>Add_Task</legend>
    <form action="" method="post">
      <input type="hidden" name="id" value="<?php echo $statut['id'] ?>">
      <input type="text" name="statut" value="<?php echo $statut['statut'] ?>" placeholder="faite / non faite" required>
      <button type="submit">Modifier</button>
    </form>
      <button><a href="dashbord.php">Liste des taches</a></button>
  </fieldset>

<?php

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    extract($_POST);
    print_r($_POST);
    try{
      $stmt = $pdo->prepare("UPDATE tasks SET statut = ? WHERE id = ?");
      $stmt->execute([$statut, $id]);
      echo "Tache mise a jour avec succée";  
    }
    catch(PDOException $e){
      echo "Erreur lors de la mise à jour ". $e->getMessage();
    }
    
  }
  }
  else{
    header("Location:index.php");
  }