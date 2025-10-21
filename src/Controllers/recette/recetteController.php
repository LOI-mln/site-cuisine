<?php
require_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Models'.DIRECTORY_SEPARATOR.'Recette.php';

class RecetteController{

    private $recetteModel;

    public function __construct() {
        $this->recetteModel = new Recette();
    }

    function ajout(){
        require_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'recette'.DIRECTORY_SEPARATOR.'ajout.php';
    }

    /**
     * Gère à la fois l'enregistrement (ADD) et la modification (UPDATE)
     */
    function enregistrer(){
        
        $titre = $_POST['titre'];
        $description = $_POST['description'];
        $auteur = $_POST['auteur'];
        
        $imagePath = null;
        $image = $_FILES['image'] ?? null;
        
        // Vérifie si on est en mode MODIFICATION (un ID est passé dans l'URL) 
        $isUpdate = isset($_GET['id']);
        
        // --- GESTION DE L'IMAGE ---

        // Cas 1: Un nouveau fichier est uploadé (fonctionne pour l'ajout et la modif)
        if ($image && $image['error'] === UPLOAD_ERR_OK) { // [cite: 192-193]
            
            $uploadDir = BASE_PATH . DIRECTORY_SEPARATOR . 'upload' . DIRECTORY_SEPARATOR;

            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }
            
            $filename = basename($image['name']);
            $targetFilePath = $uploadDir . $filename;
            
            if (move_uploaded_file($image['tmp_name'], $targetFilePath)) { // [cite: 195]
                $imagePath = 'upload/' . $filename; 
            }
        } 
        // Cas 2: On est en MODIFICATION et aucun nouveau fichier n'est uploadé [cite: 189]
        elseif ($isUpdate && $image['error'] === UPLOAD_ERR_NO_FILE) { 
            // On conserve l'ancienne image [cite: 187]
            $existingRecipe = $this->recetteModel->find($_GET['id']); // [cite: 190]
            $imagePath = $existingRecipe['image']; // [cite: 191]
        }
        // Cas 3: On est en AJOUT et aucun fichier n'est uploadé
        // $imagePath reste null (valeur par défaut)

        // --- FIN GESTION IMAGE ---


        // --- PRÉPARATION DE LA REQUÊTE (UPDATE ou ADD) ---
        
        if ($isUpdate) {
            // C'est une MODIFICATION [cite: 179]
            $id = (int)$_GET['id'];
            $this->recetteModel->update($id, $titre, $description, $auteur, $imagePath); // 
        } else {
            // C'est une CRÉATION [cite: 184]
            $this->recetteModel->add($titre, $description, $auteur, $imagePath); // 
        }

        // Redirection vers la vue de confirmation
        require_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'recette'.DIRECTORY_SEPARATOR.'enregistrer.php';
    }

    function liste(){
        $recipes = $this->recetteModel->findAll();
        require_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'recette'.DIRECTORY_SEPARATOR.'liste.php';
    }

    function detail($id){
        $recipe = $this->recetteModel->find($id);
        if (!$recipe) {
            throw new Exception("Recette non trouvée.");
        }
        require_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'recette'.DIRECTORY_SEPARATOR.'detail.php';
    }

    function modifier($id) {
        $recipe = $this->recetteModel->find($id);
        if (!$recipe) {
            throw new Exception("Recette non trouvée.");
        }
        require_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'recette'.DIRECTORY_SEPARATOR.'modif.php';
    }
}