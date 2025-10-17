<?php

class RecetteController {
    function ajouter(){
        require 'src/Views/recette/ajout.php';
    }   
    function enregistrer($pdo){
        $erreurs = [];

        $titre = trim($_POST['titre'] ?? '');
        $description = trim($_POST['description'] ?? '');
        $auteur = trim($_POST['auteur'] ?? '');

        if ($titre === '' || mb_strlen($titre) > 100) $erreurs[] = "Titre invalide.";
        if ($auteur === '' || mb_strlen($auteur) > 100) $erreurs[] = "Auteur invalide.";
        if ($description === '') $erreurs[] = "Description obligatoire.";

        if (empty($erreurs)) {
            try {
                $stmt = $pdo->prepare(
                    "INSERT INTO recettes (titre, description, auteur) VALUES (:t, :d, :a)"
                );
                $stmt->execute([':t'=>$titre, ':d'=>$description, ':a'=>$auteur]);
            } catch (Throwable $e) {
                $erreurs[] = "Erreur DB : " . $e->getMessage();
            }
        }

        require_once (__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'recette'.DIRECTORY_SEPARATOR.'enregistrer.php');
        }

    function lister($pdo){
        // Préparation de la requête d'insertion dans la base de données
        /** @var PDO $pdo **/
        $requete = $pdo->prepare("SELECT * FROM recettes");
        // Exécution de la requête et récupération des données
        $requete->execute();
        $recipes = $requete->fetchAll(PDO::FETCH_ASSOC);
        require_once (__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'recette'.DIRECTORY_SEPARATOR.'liste.php');
        }
}