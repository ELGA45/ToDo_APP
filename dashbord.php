<?php
  session_start();
  if(isset($_SESSION['userConnected'])){
    $id_user = $_SESSION['userConnected']['id'];

    include 'config/db.php';
    $stmt = $pdo->query("SELECT titre, description,date_limite, statut FROM tasks
                        WHERE user_id = $id_user");
    $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if($tasks){ ?>
      <fieldset>
        <legend>LISTE DES TACHES</legend>
        <table border="2">
          <tr>
            <th>Titre</th>
            <th>Description</th>
            <th>Date limite</th>
            <th>Statut</th>
            <th>ACTION</th>
          </tr>
          <?php
            foreach($tasks as $task){?>
              <tr>
                <td><?php echo $task['titre']?></td>
                <td><?php echo $task['description']?></td>
                <td><?php echo $task['date_limite']?></td>
                <td><?php echo $task['statut']?></td>
                <td><?php echo "<a href='mark_task.php'>edit Statut</a> ";
                          echo "<a href='delete.php'>Supprimer</a> ";?>
                </td>
              </tr>
      <?php } ?>
        </table>
      </fieldset>
<?php }
    echo "<button><a href='add_task.php'>tache une tache</a></button>";
  }