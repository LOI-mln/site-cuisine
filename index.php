<?php
// index.php (racine)
declare(strict_types=1);
session_start();

define('BASE_PATH', __DIR__);
define('SRC_PATH', BASE_PATH . '/src');

// Commun
require_once SRC_PATH . '/Controllers/recette/RecetteController.php';      // doit définir $pdo
require_once SRC_PATH . '/Views/forme/header.php';

$route = $_GET['c'] ?? 'home';
$option = $_GET['a'] ?? 'index';

try {
    switch ($route) {

        case 'Recette' :

            switch ($option){
                case 'ajout':
                    require_once SRC_PATH . '/Controllers/recette/RecetteController.php';
                    $ctrl = new RecetteController();
                    $ctrl->ajout();
                    break;

                case 'liste':
                    require_once SRC_PATH . '/Controllers/recette/RecetteController.php';
                    $ctrl = new RecetteController();
                    $ctrl->liste();
                    break;

                case 'enregistrer':
                    require_once SRC_PATH . '/Controllers/recette/RecetteController.php';
                   
                    $ctrl = new RecetteController();
                    $ctrl->enregistrer($pdo);
                    break;
                }break;

        case 'Contact':

            switch($option){

                case 'ajouter':
                    require_once SRC_PATH . '/Controllers/contact/ContactController.php';
                    $ctrl = new ContactController();
                    $ctrl->ajouter();
                    break;

                case 'enregistrer':
                    require_once SRC_PATH . '/Controllers/contact/ContactController.php';
                    $ctrl = new ContactController();
                    $ctrl->enregistrer($pdo);
                    break;
                }break;

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