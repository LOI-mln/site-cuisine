<?php 

require_once __DIR__.DIRECTORY_SEPARATOR.'Database.php';

Class User {
    private $pdo;

    public function __construct() {
        $database = new Database();
        $this->pdo = $database->getConnection();
    }
    
    // Note : On change "recettes" en "users"
    
    public function findAll() {
        $query = "SELECT * FROM users";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id) {
        $query = "SELECT * FROM users WHERE id = :id"; // Utilisation d'un paramètre lié
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function findBy(array $params){
        $query = "SELECT * FROM users WHERE ".implode(' AND ', array_map(function($key){
            return "$key = :$key";
        }, array_keys($params)));

        $stmt = $this->pdo->prepare($query);
        foreach($params as $key => $value){
            $stmt->bindValue(":$key", $value);
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Fonction d'ajout adaptée pour les utilisateurs
    public function add($identifiant, $mail, $password) {
        // create_time est automatique, isAdmin est 0 par défaut
        $query = "INSERT INTO users (identifiant, mail, password) VALUES (:identifiant, :mail, :password)";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(':identifiant', $identifiant);
        $stmt->bindValue(':mail', $mail);
        $stmt->bindValue(':password', $password); // Le hashage est fait dans le contrôleur
        
        return $stmt->execute();
    }

    
}