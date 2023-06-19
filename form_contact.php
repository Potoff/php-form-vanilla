<!DOCTYPE html>
<html>
    <head>
        <title>Form Contact</title>
        <meta charset="utf-8">
</head>
<body>
	<h1>Contactez-nous</h1>
	<form method="post" action="traitement.php">
		<label for="nom">Nom :</label>
		<input type="text" id="nom" name="nom" required><br><br>
		
		<label for="prenom">Prénom :</label>
		<input type="text" id="prenom" name="prenom" required><br><br>
		
		<label for="email">Email :</label>
		<input type="email" id="email" name="email" required><br><br>
		
		<label for="telephone">Téléphone :</label>
		<input type="tel" id="telephone" name="telephone" pattern="[0-9]{10}" required><br><br>
		
		<label for="adresse">Adresse :</label>
		<input type="text" id="adresse" name="adresse" required><br><br>
		
		<label for="codepostal">Code Postal :</label>
		<input type="text" id="codepostal" name="codepostal" pattern="[0-9]{5}" required><br><br>
		
		<label for="ville">Ville :</label>
		<input type="text" id="ville" name="ville" required><br><br>
		
		<label for="commentaire">Commentaire :</label>
		<textarea id="commentaire" name="commentaire"></textarea><br><br>
		
		<input type="submit" value="Envoyer">
	</form>
</body>
</html>