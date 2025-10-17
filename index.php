<?php
// index.php (racine)
declare(strict_types=1);
session_start();

define('BASE_PATH', __DIR__);
define('SRC_PATH', BASE_PATH . '/src');

// Commun
require_once SRC_PATH . '/Models/connectDb.php';      // doit définir $pdo
require_once SRC_PATH . '/Views/forme/header.php';

// Route unique ?c=...
$route = $_GET['c'] ?? 'home';

try {
    switch ($route) {

        case 'ajout':
            require_once SRC_PATH . '/Controllers/recette/RecetteController.php';
            $ctrl = new RecetteController();
            $ctrl->ajouter();
            break;

        case 'liste':
            require_once SRC_PATH . '/Controllers/recette/RecetteController.php';
            $ctrl = new RecetteController();
            $ctrl->lister($pdo);
            break;

        case 'enregistrer':
            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                http_response_code(405);
                echo '<p>Méthode non autorisée.</p>';
                break;
            }
            require_once SRC_PATH . '/Controllers/recette/RecetteController.php';
            $ctrl = new RecetteController();
            $ctrl->enregistrer($pdo);
            break;

        case 'contact':
            require_once SRC_PATH . '/Controllers/contact/contactController.php';
            break;

        case 'sendContact':
            require_once SRC_PATH . '/Controllers/contact/sendContactController.php';
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
