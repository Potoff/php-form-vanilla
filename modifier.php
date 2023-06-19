<!DOCTYPE html>
<html>
<head>
	<title>Modifier un contact</title>
</head>
<body>
	<h1>Modifier un contact</h1>
	<?php
	// Connexion à la base de données
	$serveur = "localhost";
$utilisateur = "root";
$motdepasse = "";
$basededonnees = "webintel";

$con = mysqli_connect($serveur, $utilisateur, $motdepasse, $basededonnees);
	if ($con->connect_error) {
		die("Connexion échouée: " . $con->connect_error);
	}

	// Récupérer les données du contact à modifier
	$id = $_GET['id'];
	$sql = "SELECT * FROM contacts WHERE id='$id'";
	$result = $con->query($sql);
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		$nom = $row['nom'];
		$prenom = $row['prenom'];
		$email = $row['email'];
		$telephone = $row['telephone'];
		$adresse = $row['adresse'];
		$codepostal = $row['code_postal'];
		$ville = $row['ville'];
		$commentaire = $row['commentaire'];
	}


	// Afficher le formulaire pré-rempli avec les informations du contact sélectionné
	echo "<form action='modifier.php?id=$id' method='post'>";
	echo "<label for='nom'>Nom :</label>";
	echo "<input type='text' id='nom' name='nom' value='$nom'><br>";
	echo "<label for='prenom'>Prénom :</label>";
	echo "<input type='text' id='prenom' name='prenom' value='$prenom'><br>";
	echo "<label for='email'>Email :</label>";
	echo "<input type='email' id='email' name='email' value='$email'><br>";
	echo "<label for='telephone'>Téléphone :</label>";
	echo "<input type='tel' id='telephone' name='telephone' value='$telephone'><br>";
	echo "<label for='adresse'>Adresse :</label>";
	echo "<input type='text' id='adresse' name='adresse' value='$adresse'><br>";
	echo "<label for='codepostal'>Code postal :</label>";
	echo "<input type='text' id='codepostal' name='codepostal' value='$codepostal'><br>";
	echo "<label for='ville'>Ville :</label>";
	echo "<input type='text' id='ville' name='ville' value='$ville'><br>";
	echo "<label for='commentaire'>Commentaire :</label>";
	echo "<textarea id='commentaire' name='commentaire'>$commentaire</textarea><br>";
	echo "<input type='submit' value='Modifier'>";
	echo "</form>";

	// Traitement du formulaire
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$email = $_POST['email'];
		$telephone = $_POST['telephone'];
		$adresse = $_POST['adresse'];
		$codepostal = $_POST['codepostal'];
		$ville = $_POST['ville'];
		$commentaire = $_POST['commentaire'];

		$sql = "UPDATE contacts SET nom='$nom', prenom='$prenom', email='$email', telephone='$telephone', adresse='$adresse', codepostal='$codepostal', ville='$ville', commentaire='$commentaire' WHERE id='$id'";
		if ($conn->query($sql) === TRUE) {
			echo "Les informations du contact ont été mises à jour avec succès.";
		} else {
			echo "Erreur lors de la mise à jour des informations du contact : " . $conn->error;
		}
	}

	$con->close();
	?>
</body>
</html>