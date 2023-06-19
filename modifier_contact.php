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

// Récupération de l'identifiant du contact à modifier
$id = mysqli_real_escape_string($connexion, $_GET["id"]);

// Vérification de l'existence du contact
$sql = "SELECT * FROM contacts WHERE id='$id'";
$resultat = mysqli_query($connexion, $sql);

if (mysqli_num_rows($resultat) != 1) {
    die("Contact introuvable.");
}

$ligne = mysqli_fetch_assoc($resultat);

// Vérification de l'envoi du formulaire de modification
if (isset($_POST["modifier"])) {
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

    // Mise à jour des données en base de données
    $sql = "UPDATE contacts SET nom='$nom', prenom='$prenom', email='$email', telephone='$telephone', adresse='$adresse', code_postal='$code_postal', ville='$ville', commentaire='$commentaire' WHERE id='$id'";

    if (mysqli_query($connexion, $sql)) {
        echo "Informations modifiées avec succès.";
    } else {
        echo "Erreur: " . mysqli_error($connexion);
    }
}

// Affichage du formulaire de modification
?>
<form action="modifier_contact.php?id=<?php echo $id; ?>" method="post">
    <label for="nom">Nom:</label>
    <input type="text" name="nom" id="nom" value="<?php echo $ligne["nom"]; ?>" required>

    <label for="prenom">Prénom:</label>
    <input type="text" name="prenom" id="prenom" value="<?php echo $ligne["prenom"]; ?>" required>

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" value="<?php echo $ligne["email"]; ?>" required>

    <label for="telephone">Téléphone:</label>
    <input type="tel" name="telephone" id="telephone" pattern="[0-9]{10}" value="<?php echo $ligne["telephone"]; ?>" required>

    <label for="adresse">Adresse:</label>
    <input type="text" name="adresse" id="adresse" value="<?php echo $ligne["adresse"]; ?>" required>

    <label for="codepostal">Code postal:</label>
    <input type="text" name="codepostal" id="codepostal" value="<?php echo $ligne["code_postal"]; ?>" required>

    <label for="ville">Ville:</label>
    <input type="text" name="ville" id="ville" value="<?php echo $ligne["ville"]; ?>" required>

    <label for="commentaire">Commentaire:</label>
    <textarea name="commentaire" id="commentaire" required><?php echo str_replace("<br />", "\r\n", $ligne["commentaire"]); ?></textarea>

    <input type="submit" name="modifier" value="Modifier">
</form>