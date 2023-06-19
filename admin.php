<!DOCTYPE html>
<html>
<head>
	<title>Liste des contacts</title>
</head>
<body>
	<h1>Liste des contacts</h1>
	<table>
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
</body>
</html>