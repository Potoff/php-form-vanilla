<!DOCTYPE html>
<html>
    <head>
        <title>Admin</title>
        <meta charset="utf-8">
</head>
<body>
<form action="traitement_connexion.php" method="post">
    <label for="nom_utilisateur">Nom d'utilisateur:</label>
    <input type="text" name="nom_utilisateur" id="nom_utilisateur" required>

    <label for="mot_de_passe">Mot de passe:</label>
    <input type="password" name="mot_de_passe" id="mot_de_passe" required>

    <input type="submit" value="Se connecter">
</form>
</body>