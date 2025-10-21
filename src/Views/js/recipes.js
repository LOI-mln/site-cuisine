// Écoute le chargement du DOM [cite: 58]
document.addEventListener('DOMContentLoaded', () => {

    // Selectionne toutes les recettes avec la classe 'recipe' 
    let recipes = document.querySelectorAll(".recipe");

    // Ajoute un écouteur d'événements sur chaque recette
    recipes.forEach(recipe => { // [cite: 61]

        // MODIFICATION : Change le curseur en "pointer" 
        recipe.style.cursor = 'pointer';

        // Ajoute un fond gris lorsque la souris passe dessus [cite: 62-63]
        recipe.addEventListener('mouseover', (event) => {
            recipe.style.backgroundColor = 'lightgray';
        });

        // Retire le fond gris lorsque la souris part [cite: 66-67]
        recipe.addEventListener('mouseout', (event) => {
            recipe.style.backgroundColor = '';
        });

        // Événement au clic [cite: 71]
        recipe.addEventListener('click', (event) => {
            event.preventDefault(); // [cite: 72]
            
            // Recupere l'ID de la recette depuis l'attribut data-id [cite: 73]
            let recipeId = recipe.dataset.id; 
            
            // MODIFICATION : Ouvre la vue de détail au clic 
            window.location.href = `?c=Recette&a=detail&id=${recipeId}`;
        });
    });
});