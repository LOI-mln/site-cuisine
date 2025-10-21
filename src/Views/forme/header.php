<?php // src/Views/forme/header.php ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>La Cosina</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script src="./src/Views/js/recipes.js" defer></script>
    <script src="./src/Views/js/users.js" defer></script>
</head>
<body class="d-flex flex-column min-vh-100">
    <nav class="navbar navbar-expand-lg bg-body-tertiary justify-content-between">
        
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
            
            <?php if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 1): ?>
            <li class="nav-item">
                <a class="nav-link" href='?c=Recette&a=ajout'>Ajout</a>
            </li>
            <?php endif; ?>
        </ul>
        
        <ul class="navbar-nav">
            <?php if(isset($_SESSION['identifiant'])): ?>
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Bienvenue <?php echo htmlspecialchars($_SESSION['identifiant']); ?>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="?c=User&a=profil">Mon profil</a></li>
                        <?php if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 1): ?>
                        <li><a class="dropdown-item" href="?c=Recette&a=ajout">Ajouter une recette</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-dark mx-1" href="?c=User&a=deconnexion">Déconnexion</a>
                </li>
                
            <?php else: ?>
            
                <li class="nav-item">
                    <a class="btn btn-outline-dark mx-1" href="?c=User&a=inscription">Inscription</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-dark mx-1" href="?c=User&a=connexion">Connexion</a>
                </li>
                
            <?php endif; ?>
        </ul>
    </nav>
    
    <main class="container w-75 m-auto flex-fill">
