<?php
// Connexion à la base de données
$serveur = "localhost";
$utilisateur = "root";
$motdepasse = "";
$basededonnees = "webintel";

$connexion = mysqli_connect($serveur, $utilisateur, $motdepasse, $basededonnees);

if (!$connexion) {
    die("Connexion échouée: " . mysqli_connect_error());
}

// Récupération des données du formulaire
$nom = mysqli_real_escape_string($connexion, $_POST["nom"]);
$prenom = mysqli_real_escape_string($connexion, $_POST["prenom"]);
$email = mysqli_real_escape_string($connexion, $_POST["email"]);
$telephone = mysqli_real_escape_string($connexion, $_POST["telephone"]);
$adresse = mysqli_real_escape_string($connexion, $_POST["adresse"]);
$code_postal = mysqli_real_escape_string($connexion, $_POST["codepostal"]);
$ville = mysqli_real_escape_string($connexion, $_POST["ville"]);
$commentaire = mysqli_real_escape_string($connexion, nl2br($_POST["commentaire"]));

// Vérification des données saisies
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Email invalide.");
}

if (strlen($telephone) != 10 || !ctype_digit($telephone)) {
    die("Téléphone invalide.");
}

// Enregistrement des données en base de données
$sql = "INSERT INTO contacts (nom, prenom, email, telephone, adresse, code_postal, ville, commentaire) VALUES ('$nom', '$prenom', '$email', '$telephone', '$adresse', '$code_postal', '$ville', '$commentaire')";

if (mysqli_query($connexion, $sql)) {
    echo "Informations enregistrées avec succès.<br>";
    echo "<a href='modifier_contact.php?id=" . mysqli_insert_id($connexion) . "'>Modifier les informations</a>";
} else {
    echo "Erreur: " . mysqli_error($connexion);
}

// Fermeture de la connexion à la base de données
mysqli_close($connexion);
?>