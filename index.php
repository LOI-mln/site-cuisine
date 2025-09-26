<?php

require_once __DIR__.'/src/Models/connectDb.php';


require_once __DIR__.'/src/Views/header.php';

$c = $_GET['c'] ?? 'home';

switch ($c) {
    case 'contact':
        require_once __DIR__.'/src/Controllers/contactController.php';
        break;

    case 'home':
    default:
        require_once __DIR__.'/src/Controllers/homeController.php';
        break;
}


require_once __DIR__.'/src/Views/footer.php';
