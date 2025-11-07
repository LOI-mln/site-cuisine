// Écoute le chargement du DOM [cite: 58]
document.addEventListener('DOMContentLoaded', () => {

    // Selectionne toutes les recettes avec la classe 'recipe' 
    let recipes = document.querySelectorAll(".recipe");

    // Ajoute un écouteur d'événements sur chaque recette
    recipes.forEach(recipe => { 

        // MODIFICATION : Change le curseur en "pointer" 
        recipe.style.cursor = 'pointer';

        // Ajoute un fond gris lorsque la souris passe dessus 
        recipe.addEventListener('mouseover', (event) => {
            recipe.style.backgroundColor = 'lightgray';
        });

        // Retire le fond gris lorsque la souris part 
        recipe.addEventListener('mouseout', (event) => {
            recipe.style.backgroundColor = '';
        });

        // Événement au clic 
        recipe.addEventListener('click', (event) => {
            event.preventDefault();

            // Recupere l'ID de la recette depuis l'attribut data-id
            let recipeId = recipe.dataset.id;
            
            // MODIFICATION : Ouvre la vue de détail au clic 
            window.location.href = `?c=Recette&a=detail&id=${recipeId}`;
        });
    });
});