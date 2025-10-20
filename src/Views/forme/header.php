<?php // src/Views/header.php ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>La Cosina</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="d-flex flex-column min-vh-100">
    <!-- menu de navigation -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href='?c=home'>Accueil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href='?c=Recette&a=liste'>Recettes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href='?c=Contact&a=ajouter'>Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href='?c=Recette&a=ajout'>Ajout</a>
            </li>
        </ul>
    </nav>
    
    <main class="container flex-fill">
        
