<!DOCTYPE html>
<html>
    <head>
        <title>Form Contact</title>
        <meta charset="utf-8">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
	<section class="container card m-auto my-5">
		<div class="row">
			<div class="col-md-6 mx-auto my-4">
	<h1>Contactez-nous</h1>
	<form method="post" action="traitement.php" class="mt-4">
		<div class="mb-2">
		<label for="nom" class="form-label">Nom :</label>
		<input type="text" id="nom" name="nom" required class="form-control">
		</div>

		<div class="mb-2">
		<label for="prenom" class="form-label">Prénom :</label>
		<input type="text" id="prenom" name="prenom" class="form-control" required><br><br>
		</div>
		
		<div class="mb-2">
			<label for="email" class="form-label">Email :</label>
			<input type="email" id="email" name="email" class="form-control" required><br><br>
		</div>
		

		<div class="mb-2">
		<label for="telephone" class="form-label">Téléphone :</label>
		<input type="tel" id="telephone" name="telephone" class="form-control" pattern="[0-9]{10}" required><br><br>
		</div>

		<div class="mb-2">
		<label for="adresse" class="form-label">Adresse :</label>
		<input type="text" id="adresse" name="adresse" required class="form-control"><br><br>
        </div>	

		<div class="mb-2">
		<label for="codepostal" class="form-label">Code Postal :</label>
		<input type="text" id="codepostal" class="form-control" name="codepostal" pattern="[0-9]{5}" required><br><br>
		</div>

		<div class="mb-2">
		<label for="ville" class="form-label">Ville :</label>
		<input type="text" id="ville" name="ville" class="form-control" required><br><br>
		</div>

		<div class="mb-2">
		<label for="commentaire" class="form-label">Commentaire :</label>
		<textarea id="commentaire" name="commentaire" class="form-control"></textarea><br><br>
		</div>


		<button type="submit" value="Envoyer" class="btn btn-success">Envoyer</button>
		</div>
		</div>
	</form>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
	</section>
</body>
</html>