<fieldset>
      <legend>Deconnection</legend>
      <p>Voulez vous vous deconnecter</p>
      <form action="" method="POST">
        <button type="submit" name="val" value="oui">OUI</button>
        <button type="submit" name="val" value="non">NON</button>
      </form>
</fieldset> 

<?php
  if($_SERVER['REQUEST_METHOD'] === 'POST'){
    extract($_POST);
    if($val == "oui"){
      session_start();
      if(isset($_SESSION['userConnected'])){
        unset($_SESSION['userConnected']);
        header('Location:login.php');
        exit();
      }
    }
    else{
        header('Location:dashbord.php');
        exit();
    }
  }