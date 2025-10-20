<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class ContactController{

    function ajouter(){
        // Lien vers la vue contact
        require_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'contact'.DIRECTORY_SEPARATOR.'contact.php';
    }

    function enregistrer($pdo){
        // récupération des données de formulaire
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $message = $_POST ['message'] ;


        /** @var PDO $pdo **/
        $requete = $pdo->prepare('INSERT INTO contact (nom,email,message) VALUES (:nom,:email,:message)');
        $requete->bindParam(':nom', $nom);
        $requete->bindParam(':email', $email);
        $requete->bindParam(':message', $message);

        // exécution de la requête
        $ajoutOk2 = $requete->execute();
        if ($ajoutOk2) {
            // redirection vers la vue d'enregistrement effectué
            require_once(__DIR__ . DIRECTORY_SEPARATOR . 'ContactController.php');
        } else {
            echo 'Erreur lors de l\'enregistrement de la recette.';
        }

         require 'vendor/autoload.php'; // si tu utilises Composer

        $mail = new PHPMailer(true);

        try {
        // Paramètres SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // ou smtp.yourhost.com
        $mail->SMTPAuth = true;
        $mail->Username = 'm.tidjani87@gmail.com';
        $mail->Password = 'zqsj gtnr qjlw jela';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Optionnel si problème de certificat (développement uniquement)
        $mail->SMTPOptions = [
        'ssl' => [
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        ]
        ];

        // Expéditeur et destinataire
        $mail->setFrom('m.tidjani87@gmail.com', 'Ton Nom');
        $mail->addAddress('destinataire@example.com');

        // Contenu
        $mail->isHTML(true);
        $mail->Subject = 'Test PHPMailer';
        $mail->Body    = '<b>Bonjour</b>, ceci est un test avec PHPMailer.';
        $mail->AltBody = 'Bonjour, ceci est un test avec PHPMailer.';

        $mail->send();
        require_once(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'contact'.DIRECTORY_SEPARATOR.'envoieMail.php');
        } catch (Exception $e) {
        echo "Message non envoyé. Erreur : {$mail->ErrorInfo}";
        }
    }
       
}
