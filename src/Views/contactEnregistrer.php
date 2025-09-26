<?php // src/Views/contactEnregistrer.php ?>
<h1>Contact</h1>

<?php if (!empty($erreurs)): ?>
    <div class="alert alert-danger">
        <ul class="mb-0">
            <?php foreach ($erreurs as $e): ?>
                <li><?= htmlspecialchars($e) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <a class="btn btn-secondary mt-3" href="?c=contact">Retour</a>
<?php else: ?>
    <div class="alert alert-success">Votre message a bien été envoyé.</div>
    <a class="btn btn-primary mt-3" href="?c=home">Retour à l’accueil</a>
<?php endif; ?>
