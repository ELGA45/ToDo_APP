<?php
  if(isset($_GET['id'])){
    include 'config/db.php';
    $stmt = $pdo->query("SELECT * FROM tasks WHERE id=".$_GET['id']."");
    $task = $stmt->fetch(PDO::FETCH_ASSOC);
  ?>  
    <fieldset>
      <legend>Validation</legend>
      <p>Voulez vous supprmiez la tache <?php echo $task['titre'] ?></p>
      <form action="" method="POST">
        <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>"> <br>
        <button type="submit" name="val" value="oui">OUI</button>
        <button type="submit" name="val" value="non">NON</button>
      </form>
    </fieldset>  
    
  <?php
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
      extract($_POST);
      if($val == "oui"){
        $stmt = $pdo->prepare("DELETE FROM tasks WHERE id = ?");
        $stmt->execute([$id]);
        header('Location:dashbord.php');
      }
      else{
        header('Location:dashbord.php');
      }
    }

  }



