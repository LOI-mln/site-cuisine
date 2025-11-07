<?php // src/Views/recette/detail.php ?>

<h1>Titre : <?php echo htmlspecialchars($recipe['titre']); ?></h1>

<?php
$imagePath = 'upload/no-image.png'; 
if (!empty($recipe['image'])) {
    $imagePath = $recipe['image'];
}
?>
<img src="<?php echo $imagePath; ?>" class="img-fluid my-3" alt="<?php echo htmlspecialchars($recipe['titre']); ?>">

<p> Description : <?php echo nl2br(htmlspecialchars($recipe['description'])); ?></p>
<a href='mailto:<?php echo htmlspecialchars($recipe['auteur']); ?>'>Contacter l'auteur</a>

<hr>
<a href="?c=Recette&a=liste" class="btn btn-primary">Retour à la liste</a>

<?php if (isset($_SESSION['identifiant'])): ?>
<a href="?c=Recette&a=modifier&id=<?php echo $recipe['id']; ?>" class="btn btn-secondary">Modifier la recette</a>
<a href="?c=Favori&a=ajouter&id=<?php echo $recipe['id']; ?>" class="btn btn-secondary">Ajouter aux favoris</a>
<?php endif; ?>