<?php // src/Views/User/profil.php ?>
<h1>Profil de l'utilisateur : 
    <span id='profil_identifiant_titre'><?php echo htmlspecialchars($user['identifiant']); ?></span>
</h1>

<div class="row">
    <div class="col-md-4">
        <img class="w-75 rounded mx-auto img-fluid" src="upload/profil.png" alt="<?php echo htmlspecialchars($user['identifiant']);?>">
    </div>
    <div class="col-md-8">
        <p><b>Identifiant: </b>
            <span id="profil_identifiant" data-id="<?php echo $user['id']; ?>" contenteditable="true">
                <?php echo htmlspecialchars($user['identifiant']); ?>
            </span>
        </p>
        <p><b>Email: </b>
            <span id="profil_mail" data-id="<?php echo $user['id']; ?>" contenteditable="true">
                <?php echo htmlspecialchars($user['mail']); ?>
            </span>
        </p>
    </div>
</div>
<hr>
<div id="boutons">
    <button id="bouton_modifier_profil" class="btn btn-primary d-none">Modifier le profil</button>
    <a href="?c=home" class="btn btn-primary">Retour à l'accueil</a>
</div>