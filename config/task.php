<?php
  include "db.php";

  class Task {
    private $conn;
    public function __construct(){
      $db = new Database();
      $this->conn = $db->connect(); 
    }

    public function CreateTask($id_user, $titre, $description, $date_limite){
      try {
        $sql = "INSERT INTO tasks(user_id, titre, description, date_limite) VALUE(?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id_user, $titre, $description, $date_limite]);
        echo "Tache Ajouter avec succé";
      } catch (PDOException $e) {
        echo "Erreur lors de l'ajout : " . $e->getMessage();
      }
    }
    // Pour lire les tache d'un user
    public function TacheUser($id_user){
      $stmt = $this->conn->query("SELECT * FROM tasks
                        WHERE user_id = $id_user");
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lire statut d'une tache 
    public function Tache($id){
      $stmt = $this->conn->prepare("SELECT * FROM tasks WHERE id = ?");
      $stmt->execute([$id]);
      return $stmt->fetch(PDO::FETCH_ASSOC); // Retourne false si aucune ligne trouvée
    }

    //  Changer de statut
    public function editMark($id, $statut){
      try{
      $stmt = $this->conn->prepare("UPDATE tasks SET statut = ? WHERE id = ?");
      $stmt->execute([$statut, $id]);
        echo "Tache mise a jour avec succée";  
      }
      catch(PDOException $e){
        echo "Erreur lors de la mise à jour ". $e->getMessage();
      }
    }

    public function Delete($id){
      $stmt = $this->conn->prepare("DELETE FROM tasks WHERE id = ?");
      $stmt->execute([$id]);
    }
  }
