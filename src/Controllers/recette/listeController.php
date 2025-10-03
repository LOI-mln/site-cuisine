<?php
    // Préparation de la requête d'insertion dans la base de données
    /** @var PDO $pdo **/
    $requete = $pdo->prepare("SELECT * FROM recettes");
    // Exécution de la requête et récupération des données
    $requete->execute();
    $recipes = $requete->fetchAll(PDO::FETCH_ASSOC);
    require_once (__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'liste.php');