<?php // src/Views/enregistrer.php ?>
<h1>Enregistrement de la recette</h1>

<?php if (!empty($erreurs)): ?>
    <div class="alert alert-danger">
        <ul class="mb-0">
            <?php foreach ($erreurs as $e): ?>
                <li><?= htmlspecialchars($e) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <a class="btn btn-secondary mt-3" href="?c=ajout">Retour au formulaire</a>
<?php else: ?>
    <div class="alert alert-success">La recette a bien été enregistrée.</div>
    <a class="btn btn-primary mt-3" href="?c=home">Retour à l’accueil</a>
<?php endif; ?>
