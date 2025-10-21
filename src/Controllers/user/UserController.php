<?php
require_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Models'.DIRECTORY_SEPARATOR.'User.php';

class UserController {

    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    function inscription() {
        require_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'User'.DIRECTORY_SEPARATOR.'inscription.php';
    }

    function inscrire() {
        $identifiant = $_POST['identifiant'];
        $mail = $_POST['mail'];
        $pwd = $_POST['pwd'];
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
        $success = $this->userModel->add($identifiant, $mail, $hashedPwd);

        if ($success) {
            require_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'User'.DIRECTORY_SEPARATOR.'enregistrement.php';
        } else {
            echo "Erreur lors de l'inscription.";
        }
    }

    /**
     * NOUVEAU : Affiche le formulaire de connexion
     */
    function connexion() {
        require_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'User'.DIRECTORY_SEPARATOR.'connexion.php';
    }

    /**
     * NOUVEAU : Vérifie les identifiants et connecte l'utilisateur
     */
    function connecter() {
        // récupération des données de formulaire
        $identifiant = $_POST['identifiant'];
        $pwd = $_POST['pwd'];

        // on cherche l'utilisateur par son identifiant
        // findBy renvoie un tableau d'utilisateurs
        $users = $this->userModel->findBy(['identifiant' => $identifiant]);
        
        // on prend le premier utilisateur trouvé
        $user = $users[0] ?? null;

        // si l'utilisateur existe et le mot de passe est correct
        if($user && password_verify($pwd, $user['password'])) {
            // définition des variables de session
            $_SESSION['id'] = $user['id'];
            $_SESSION['identifiant'] = $user['identifiant'];
            $_SESSION['mail'] = $user['mail'];
            // (J'ajoute isAdmin, c'est indispensable pour la suite du TP)
            $_SESSION['isAdmin'] = $user['isAdmin'];
            
            // Redirection vers l'accueil
            header('Location: ?c=home');
            exit();
            
        } else {
            // Message d'erreur
            $error = 'Identifiant ou mot de passe incorrect.';
            // Affiche à nouveau la vue connexion avec le message d'erreur
            require_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'User'.DIRECTORY_SEPARATOR.'connexion.php';
        }
    }
    
    /**
     * NOUVEAU : Déconnecte l'utilisateur
     */
    function deconnexion() {
        session_destroy();
        header('Location: ?c=home');
        exit();
    }

    function profil() {
        // Vérifie si l'utilisateur est connecté
        if (!isset($_SESSION['id'])) {
            header('Location: ?c=User&a=connexion');
            exit();
        }
        
        // Récupère les infos de l'utilisateur depuis la BDD
        $user = $this->userModel->find($_SESSION['id']);
        
        if ($user) {
            // Charge la vue profil en lui passant les données
            require_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'User'.DIRECTORY_SEPARATOR.'profil.php';
        } else {
            // Utilisateur non trouvé (problème de session ?)
            $this->deconnexion();
        }
    }
} // Fin de la classe
