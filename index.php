<?php
// index.php

require_once __DIR__ . '/src/Models/connectDb.php';
require_once __DIR__ . '/src/Views/header.php';

$route = $_GET['c'] ?? 'home';

switch ($route) {
    case 'ajout':
        require_once __DIR__ . '/src/Controllers/ajoutController.php';
        break;

    case 'enregistrer':
        require_once __DIR__ . '/src/Controllers/enregistrerController.php';
        break;

    case 'contact':
        require_once __DIR__ . '/src/Controllers/contactController.php';
        break;

    case 'sendContact':
        require_once __DIR__ . '/src/Controllers/sendContactController.php';
        break;

    case 'home':
    default:
        require_once __DIR__ . '/src/Controllers/homeController.php';
        break;
}

require_once __DIR__ . '/src/Views/footer.php';
