<!-- traitement_connexion.php -->
<?php
session_start();
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
$nom_utilisateur = $_POST["nom_utilisateur"];
$mot_de_passe =  $_POST["mot_de_passe"];

// Recherche de l'utilisateur dans la base de données
$sql = "SELECT * FROM utilisateurs WHERE nom_utilisateur='$nom_utilisateur' AND mot_de_passe='$mot_de_passe'";
$resultat = $connexion->query($sql);

if ($resultat->num_rows == 1) {
        header("Location: admin.php");
    }
 else {
	// Authentification échouée, affichage d'un message d'erreur et redirection vers la page de connexion
	$_SESSION['message'] = "Nom d'utilisateur ou mot de passe incorrect";
	header('Location: connexion.php');
}
$conn->close();
?>