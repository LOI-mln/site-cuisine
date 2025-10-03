<?php
// src/Controllers/sendContactController.php

$erreurs = [];

$nom = trim($_POST['nom'] ?? '');
$email = trim($_POST['email'] ?? '');
$message = trim($_POST['message'] ?? '');

if ($nom === '' || mb_strlen($nom) > 100) $erreurs[] = "Nom invalide.";
if (!filter_var($email, FILTER_VALIDATE_EMAIL) || mb_strlen($email) > 150) $erreurs[] = "E-mail invalide.";
if ($message === '') $erreurs[] = "Message vide.";

if (empty($erreurs)) {
    try {
        $stmt = $pdo->prepare(
            "INSERT INTO contacts (nom, email, message) VALUES (:n, :e, :m)"
        );
        $stmt->execute([':n'=>$nom, ':e'=>$email, ':m'=>$message]);

        // Bonus mail (si ton serveur est configuré) :
        // @mail('prenom.nom@etu.unilim.fr', 'Formulaire de contact',
        //       "Nom: $nom\nEmail: $email\n\nMessage:\n$message");

    } catch (Throwable $e) {
        $erreurs[] = "Erreur DB : " . $e->getMessage();
    }
}

require_once __DIR__ . '/../Views/contactEnregistrer.php';
