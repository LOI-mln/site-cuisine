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
    <!-- barre de navigation Bootstrap -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
        <div class="container">
            <a class="navbar-brand" href="?c=home">La Cosina</a>
            <div class="collapse navbar-collapse show">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="?c=home">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link" href="?c=contact">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- début contenu -->
    <main class="container flex-fill">
