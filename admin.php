<!DOCTYPE html>
<html>
<head>
	<title>Liste des contacts</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>
<body>
	<h1>Liste des contacts</h1>
	<table class="table">
		<thead>
		<tr>
			<th>Nom</th>
			<th>Prénom</th>
			<th>Email</th>
			<th>Téléphone</th>
			<th>Adresse</th>
			<th>Code Postal</th>
			<th>Ville</th>
			<th>Commentaire</th>
			<th>Actions</th>
		</tr>
		</thead>
		<?php
		// Connexion à la base de données
		$serveur = "localhost";
$utilisateur = "root";
$motdepasse = "";
$basededonnees = "webintel";
		$conn = new mysqli($serveur, $utilisateur, $motdepasse, $basededonnees);
		if ($conn->connect_error) {
			die("Connexion échouée: " . $conn->connect_error);
		}

		// Récupérer les données de la base de données pour les afficher dans le tableau
		$sql = "SELECT * FROM contacts";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				echo "<tr>";
				echo "<td>" . $row['nom'] . "</td>";
				echo "<td>" . $row['prenom'] . "</td>";
				echo "<td>" . $row['email'] . "</td>";
				echo "<td>" . $row['telephone'] . "</td>";
				echo "<td>" . $row['adresse'] . "</td>";
				echo "<td>" . $row['code_postal'] . "</td>";
				echo "<td>" . $row['ville'] . "</td>";
				echo "<td>" . nl2br($row['commentaire']) . "</td>";
				echo "<td>";
				echo "<a href='modifier.php?id=" . $row['id'] . "'>Modifier</a> ";
				echo "<a href='supprimer.php?id=" . $row['id'] . "'>Supprimer</a>";
				echo "</td>";
				echo "</tr>";
			}
		} else {
			echo "Aucun contact trouvé.";
		}
		$conn->close();
		?>
	</table>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>