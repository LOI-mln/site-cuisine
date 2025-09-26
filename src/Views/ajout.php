<?php // src/Views/ajout.php ?>
<h1>Ajouter une recette</h1>
<form method="post" action="?c=enregistrer" class="row g-3">
    <div class="col-md-6">
        <label for="titre" class="form-label">Titre</label>
        <input type="text" id="titre" name="titre" class="form-control" required maxlength="100">
    </div>
    <div class="col-md-6">
        <label for="auteur" class="form-label">Auteur</label>
        <input type="text" id="auteur" name="auteur" class="form-control" required maxlength="100">
    </div>
    <div class="col-12">
        <label for="description" class="form-label">Description</label>
        <textarea id="description" name="description" class="form-control" rows="5" required></textarea>
    </div>
    <div class="col-12">
        <button class="btn btn-primary">Enregistrer</button>
    </div>
</form>
