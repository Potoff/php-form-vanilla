<!DOCTYPE html>
<html>
    <head>
        <title>Admin</title>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>
<body>
<form action="traitement_connexion.php" method="post">
    <div class="container mx-auto my-4">
    <div class="mb-2">
    <label for="nom_utilisateur" class="form-label">Nom d'utilisateur:</label>
    <input type="text" name="nom_utilisateur" id="nom_utilisateur" class="form-control" required>
    </div>

    <div class="mb-2">
    <label for="mot_de_passe" class="form-label">Mot de passe:</label>
    <input type="password" name="mot_de_passe" class="form-control" id="mot_de_passe" required>
</div>
    <button type="submit" class="btn btn-success my-4">Se connecter</button>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</form>
</body>