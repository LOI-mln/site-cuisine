<?php // src/Views/recette/ajout.php ?>
<h1>Ajouter une recette</h1>

<form method="post" action="?c=Recette&a=enregistrer" class="row g-3" enctype="multipart/form-data">
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
        <label for="image" class="form-label">Image de la recette</label>
        <input type="file" class="form-control" name="image" id="image">
    </div>

    <div class="col-12">
        <button class="btn btn-primary">Enregistrer</button>
    </div>
</form>