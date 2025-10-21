<?php
// index.php (racine)
declare(strict_types=1);
session_start();

define('BASE_PATH', __DIR__);
define('SRC_PATH', BASE_PATH . '/src');

// --- GESTION PDO ---
// On inclut Database.php pour créer $pdo
require_once SRC_PATH . '/Models/Database.php'; 
// On inclut les contrôleurs
require_once SRC_PATH . '/Controllers/recette/RecetteController.php';
require_once SRC_PATH . '/Controllers/contact/ContactController.php';
require_once SRC_PATH . '/Controllers/user/UserController.php';

// On crée la connexion PDO
$database = new Database();
$pdo = $database->getConnection();
// --- FIN GESTION PDO ---

require_once SRC_PATH . '/Views/forme/header.php';

$route = $_GET['c'] ?? 'home';
$option = $_GET['a'] ?? 'index';

try {
    switch ($route) {
        case 'Recette' :
            $ctrl = new RecetteController();
            switch ($option){
                case 'ajout':
                    $ctrl->ajout();
                    break;
                case 'liste':
                    $ctrl->liste();
                    break;
                case 'enregistrer':
                    $ctrl->enregistrer();
                    break;
                case 'detail':
                    $id = $_GET['id'] ?? null;
                    if ($id === null) {
                        throw new Exception("ID de recette manquant.");
                    }
                    $ctrl->detail((int)$id);
                    break;
                
                // MODIFICATION ICI : AJOUT DE LA ROUTE 'modifier' [cite: 158]
                case 'modifier':
                    $id = $_GET['id'] ?? null;
                    if ($id === null) {
                        throw new Exception("ID de recette manquant.");
                    }
                    $ctrl->modifier((int)$id); // Appelle la fonction de l'étape 13
                    break;
                
                default:
                    $ctrl->liste();
                    break;
                }break;

        case 'Contact':
            $ctrl = new ContactController();

            switch($option){
                case 'ajouter':
                    $ctrl->ajouter();
                    break;
                case 'enregistrer':
                    // ContactController a besoin de $pdo
                    $ctrl->enregistrer($pdo); 
                    break;
                }break;
        
        case 'User':
            $ctrl = new UserController();
            switch ($option) {
                case 'inscription':
                    $ctrl->inscription();
                    break;
                case 'inscrire':
                    $ctrl->inscrire();
                    break;
                
                // AJOUT DES NOUVELLES ROUTES
                case 'connexion': // Affiche le formulaire
                    $ctrl->connexion();
                    break;
                case 'connecter': // Traite le formulaire
                    $ctrl->connecter();
                    break;
                case 'deconnexion':
                    $ctrl->deconnexion();
                    break;
                case 'profil':
                    $ctrl->profil();
                    break;
                
                // (On ajoutera 'profil' ici)
                
                default:
                    $ctrl->inscription();
                    break;
            }
            break;
        
        case 'home':
            default:
                require_once SRC_PATH . '/Controllers/homeController.php';
                break;
    }

} catch (Throwable $e) {
    http_response_code(500);
    echo "<h2>Erreur interne</h2><pre>" . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . "</pre>";
}

// Footer commun
require_once SRC_PATH . '/Views/forme/footer.php';