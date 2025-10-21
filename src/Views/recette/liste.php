<body>

    <h1>Recettes</h1>
        <a href="?c=home" class="btn btn-primary">Retour à l'accueil</a>

        <div class="row">
            <?php foreach ($recipes as $recipe) : ?>
                <div class="col-4 p-2">
                    <div class="recipe card" data-id="<?php echo $recipe['id']; ?>">
                        
                        <?php
                        // Définit le chemin de l'image par défaut 
                        $imagePath = 'upload/no_image.png'; 
                        // Si la recette a une image, on utilise celle-là
                        if (!empty($recipe['image'])) {
                            $imagePath = $recipe['image'];
                        }
                        ?>
                        <img src="<?php echo $imagePath; ?>" class="card-img-top" alt="<?php echo htmlspecialchars($recipe['titre']); ?>">
                        <div class="card-body">
                            <h2 class="card-title"><?php echo htmlspecialchars($recipe['titre']); ?></h2>
                            <p class="card-text"><?php echo htmlspecialchars($recipe['description']); ?></p>
                            Auteur : <a href="mailto:<?php echo htmlspecialchars($recipe['auteur']); ?>"><?php echo htmlspecialchars($recipe['auteur']); ?></a>
                        </div>
                     </div>
                </div>
            <?php endforeach; ?>
        </div>
</body>