// Écoute le chargement du DOM
document.addEventListener('DOMContentLoaded', () => {

    // On vérifie si on est sur la page profil
    let profil_identifiant = document.getElementById('profil_identifiant');
    let profil_mail = document.getElementById('profil_mail');
    let modifier_profil = document.getElementById('bouton_modifier_profil');

    // Si les éléments existent (on est bien sur la page profil)
    if (profil_identifiant && profil_mail && modifier_profil) {
        
        // Ajoute un écouteur pour afficher le bouton 
        profil_identifiant.addEventListener('input', (event) => {
            modifier_profil.classList.remove('d-none'); // Affiche le bouton
        });

        // Ajoute un écouteur pour afficher le bouton
        profil_mail.addEventListener('input', (event) => {
            modifier_profil.classList.remove('d-none'); // Affiche le bouton
        });
        
    }
});