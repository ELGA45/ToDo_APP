<?php
  if(isset($_GET['id'])){
    include 'config/task.php';
    $tache = new Task();
    $task = $tache->Tache($_GET['id']);
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
        $tache = new Task();
        $tache->Delete($id);
        header('Location:dashbord.php');
      }
      else{
        header('Location:dashbord.php');
      }
    }

  }



