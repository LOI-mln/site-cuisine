<?php
// index.php

require_once __DIR__ . '/src/Models/connectDb.php';
require_once __DIR__ . '/src/Views/forme/header.php';

$route = $_GET['c'] ?? 'home';

switch ($route) {
    case 'ajout':
        require_once __DIR__ . '/src/Controllers/recette/ajoutController.php';
        break;

    case 'liste':
        require_once __DIR__ . '/src/Controllers/recette/listeController.php';
        break;

    case 'enregistrer':
        require_once __DIR__ . '/src/Controllers/recette/enregistrerController.php';
        break;

    case 'contact':
        require_once __DIR__ . '/src/Controllers/contact/contactController.php';
        break;

    case 'sendContact':
        require_once __DIR__ . '/src/Controllers/contact/sendContactController.php';
        break;

    case 'home':
    default:
        require_once __DIR__ . '/src/Controllers/homeController.php';
        break;
}

require_once __DIR__ . '/src/Views/forme/footer.php';
