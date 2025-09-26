<?php
// src/Controllers/enregistrerController.php

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

require_once __DIR__ . '/../Views/enregistrer.php';
