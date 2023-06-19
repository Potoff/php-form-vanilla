<!DOCTYPE html>
<html>
<head>
	<title>Supprimer un contact</title>
</head>
<body>
	<h1>Supprimer un contact</h1>
	<?php
	// Connexion à la base de données
	$serveur = "localhost";
$utilisateur = "root";
$motdepasse = "";
$basededonnees = "webintel";

$connexion = mysqli_connect($serveur, $utilisateur, $motdepasse, $basededonnees);
	if ($connexion->connect_error) {
		die("Connexion échouée: " . $connexion->connect_error);
	}

	// Récupérer l'identifiant du contact à supprimer
	$id = $_GET['id'];

	// Vérifier si le formulaire a été soumis
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		// Supprimer le contact de la base de données
		$sql = "DELETE FROM contacts WHERE id='$id'";
		if ($connexion->query($sql) === TRUE) {
			echo "Le contact a été supprimé avec succès.";
		} else {
			echo "Erreur lors de la suppression du contact : " . $connexion->error;
		}
	} else {
		// Afficher un message de confirmation avant de supprimer le contact
		echo "Êtes-vous sûr de vouloir supprimer ce contact ?";
		echo "<form action='supprimer.php?id=$id' method='post'>";
		echo "<input type='submit' value='Oui'>";
		echo "<a href='index.php'>Non</a>";
		echo "</form>";
	}

	$connexion->close();
	?>
</body>
</html>