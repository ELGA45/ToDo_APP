<?php
  include "db.php";

  class Utilisateur {
    private $conn;
    public function __construct(){
      $db = new Database();
      $this->conn = $db->connect(); 
    }

    public function CreateUser($nom, $email, $mot_pass){
      try {
        $sql = "INSERT INTO users (id, nom, email, mot_passe) VALUES (NULL, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$nom, $email, $mot_pass]);
        header("Location:register.php?rgt=1");
      } catch (PDOException $e) {
        echo "Erreur lors de l'enragistrement : " . $e->getMessage();
      }
    }

    public function ReadAll(){
      $stmt = $this->conn->prepare("SELECT * FROM users");
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function ReadByEmail($email){
      $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = ?");
      $stmt->execute([$email]);
      return $stmt->fetch(PDO::FETCH_ASSOC);
    }
  }