<?php // src/Views/contact.php ?>
<h1>Formulaire de contact</h1>
<p>Merci de remplir ce formulaire pour nous contacter.</p>

<form method="post" action="?c=Contact&a=enregistrer" class="row g-3">
    <div class="col-md-6">
        <label for="nom" class="form-label">Nom</label>
        <input type="text" id="nom" name="nom" class="form-control" required maxlength="100">
    </div>
    <div class="col-md-6">
        <label for="email" class="form-label">E-mail</label>
        <input type="email" id="email" name="email" class="form-control" required maxlength="150">
    </div>
    <div class="col-12">
        <label for="message" class="form-label">Message</label>
        <textarea id="message" name="message" class="form-control" rows="5" required></textarea>
    </div>
    <div class="col-12">
        <button class="btn btn-primary">Envoyer</button>
    </div>
</form>
