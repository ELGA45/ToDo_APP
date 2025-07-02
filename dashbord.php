<?php
  session_start();
  if(isset($_SESSION['userConnected'])){
    $id_user = $_SESSION['userConnected']['id'];

    include 'config/db.php';
    $stmt = $pdo->query("SELECT * FROM tasks
                        WHERE user_id = $id_user");
    $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if($tasks){ ?>
      <!DOCTYPE html>
      <html lang="en">
      <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tableau de bord</title>
        <link rel="stylesheet" href="assets/style.css">
      </head>
      <body>
        <div class="container">
          <header><?php echo $_SESSION['userConnected']['email'] ?></header>
          <div class="add-dec">
            <button class="btn-1"><a href='add_task.php'>Ajouter une tache</a></button>
            <button class="btn-1"><a href='logout.php'>Se déconnecter</a></button>
          </div>
          <main>
            <h2>Vos tâche</h2>
            <?php
            foreach($tasks as $task){ ?>
            <div class="tasks">
              <div class="task">
                <h4><?php echo $task['titre']?></h4>
                <p><?php echo $task['description']?></p>
                <p>Date limite: <?php echo $task['date_limite']?></p>
              </div>
              <div class="action">
                <button class="btn-2"><?php echo "<a href='mark_task.php?id=".$task['id']."'>Marquer comme faite</a>"?></button>
                <button class="btn-2"><?php echo "<a href='delete.php?id=".$task['id']."'>Supprimer</a>"?></button>
              </div>
            </div>
            <?php } ?>
          </main>
        </div>
      </body>
      </html>

<?php }
      else{
        echo "Pas de tache <br>";
        echo "<a href="add_task.php">Ajouter une tache </a>";
      }
  }
  else{
    header("Location:index.php");
    exit();
  }
?>



