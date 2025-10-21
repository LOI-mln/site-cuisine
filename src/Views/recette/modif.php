<?php // src/Views/recette/modif.php ?>

<h1>Modifier la recette: <?php echo htmlspecialchars($recipe['titre']); ?></h1> 

<form action="?c=Recette&a=enregistrer&id=<?php echo $recipe["id"]; ?>" method="post" enctype="multipart/form-data" class="row g-3">
    
    <div class="col-md-6">
        <label for="titre" class="form-label">Titre de la recette</label> 
        <input type="text" class="form-control" value="<?php echo htmlspecialchars($recipe['titre']); ?>" name="titre" id="titre" required>
    </div>
    <div class="col-md-6">
        <label for="auteur" class="form-label">Mail de l'auteur</label> 
        <input type="email" class="form-control" value="<?php echo htmlspecialchars($recipe['auteur']); ?>" name="auteur" id="auteur" required>
    </div>
    <div class="col-12">
        <label for="description" class="form-label">Description de la recette</label> 
        <textarea class="form-control" id="description" name="description" rows="5" required><?php echo htmlspecialchars($recipe['description']); ?></textarea>
    </div>

    <div class="col-12">
        <label for="image" class="form-label">Image de la recette <br> (pour la modifier, merci de choisir la nouvelle image)</label> 
        
        <?php
        $imagePath = 'upload/no_image.png'; 
        if (!empty($recipe['image'])) {
            $imagePath = $recipe['image'];
        }
        ?>
        <img class="rounded w-25 my-3 d-block" src="<?php echo $imagePath; ?>" alt="<?php echo htmlspecialchars($recipe['titre']);?>">

        <input type="file" class="form-control" name="image" id="image">
    </div>

    <div class="col-12">
        <button type="submit" class="btn btn-primary" id="enregistrer">Modifier</button>
    </div>
</form>