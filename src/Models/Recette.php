<?php 

require_once __DIR__.DIRECTORY_SEPARATOR.'Database.php';

Class Recette {
    private $pdo;

    public function __construct() {
        $database = new Database();
        $this->pdo = $database->getConnection();
    }
    
    public function findAll() {
        $query = "SELECT * FROM recettes";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id) {
        $query = "SELECT * FROM recettes WHERE id = '$id'";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function findBy(array $params){
        $query = "SELECT * FROM recettes WHERE ".implode('AND', array_map(function($key){
            return "$key = :$key";
        }, array_keys($params)));

        $stmt = $this->pdo->prepare($query);
        foreach($params as $key => $value){
            $stmt->bindValue(":$key", $value);
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function add($titre, $description, $auteur, $image){
        $query = "INSERT INTO recettes (titre, description, auteur, image) VALUES (:titre, :description, :auteur, :image)";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(':titre', $titre);
        $stmt->bindValue(':description', $description);
        $stmt->bindValue(':auteur', $auteur);
        $stmt->bindValue(':image', $image);
        $stmt->execute();
        return $this->pdo->lastInsertId();
    }

    public function update($id, $titre, $description, $auteur, $image){
        $query = "UPDATE recettes SET titre = :titre, description = :description, auteur = :auteur, image = :image WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':titre', $titre);
        $stmt->bindValue(':description', $description);
        $stmt->bindValue(':auteur', $auteur);
        $stmt->bindValue(':image', $image);
        return $stmt->execute();
    }

    public function delete($id){
        $query = "DELETE FROM recettes WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }
}