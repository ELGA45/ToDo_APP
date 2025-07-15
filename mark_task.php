<?php
  session_start();
  if(isset($_SESSION['userConnected']) && isset($_GET['id'])){
    include 'config/task.php';
    
    $task = new Task();
    $statut = $task->Tache($_GET['id']);

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

    $task = new Task();
    $task->editMark($id, $statut);
    
    }
  }

  else{
    header("Location:index.php");
  }