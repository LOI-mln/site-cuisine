<?php
require_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Models'.DIRECTORY_SEPARATOR.'recette.php';

class recetteController{

    function ajout(){
        require_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'recette'.DIRECTORY_SEPARATOR.'ajout.php';
    }

    function enregistrer(){
        $recette = new recette();
        //récuperation des données du formulaire
        $titre = $_POST['titre'];
        $description = $_POST['description'];
        $auteur = $_POST['auteur'];
        $image = null;

        $recette->add($titre,$description,$auteur,$image);

        require_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'recette'.DIRECTORY_SEPARATOR.'enregistrer.php';

    }

    function liste(){

        $recette = new recette();
        $recipes = $recette->findAll();
        //echo("__");
        //var_dump($recipes);
        require_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'recette'.DIRECTORY_SEPARATOR.'liste.php';
    }

    function detail($id){
        $recette = new recette();
        $recipe = $recette->find($id);

        require_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'recette'.DIRECTORY_SEPARATOR.'detail.php';
    }
}