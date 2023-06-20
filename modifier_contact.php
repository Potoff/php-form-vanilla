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
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <section class="container card m-auto my-5">
    <div class="row">
			<div class="col-md-6 mx-auto my-4">
<form action="modifier_contact.php?id=<?php echo $id; ?>" method="post" class="p-4">

    <div class="mb-2">
        <label for="nom" class="form-label">Nom:</label>
        <input type="text" name="nom" id="nom" class="form-control" value="<?php echo $ligne["nom"]; ?>" required>
    </div>
        
    <div class="mb-2">
        <label for="prenom" class="form-label">Prénom:</label>
        <input type="text" name="prenom" id="prenom" class="form-control" value="<?php echo $ligne["prenom"]; ?>" required>
    </div>
   

<div class="mb-2">
    <label for="email" class="form-label">Email:</label>
    <input type="email" name="email" class="form-control" id="email" value="<?php echo $ligne["email"]; ?>" required>
</div>

<div class="mb-2">
    <label for="telephone" class="form-label">Téléphone:</label>
    <input type="tel" name="telephone" class="form-control" id="telephone" pattern="[0-9]{10}" value="<?php echo $ligne["telephone"]; ?>" required>
</div>

    <div class="mb-2">
    <label class="form-label" for="adresse">Adresse:</label>
    <input type="text" class="form-control "name="adresse" id="adresse" value="<?php echo $ligne["adresse"]; ?>" required>
    </div>

    <div class="mb-2">
    <label for="codepostal" class="form-label">Code postal:</label>
    <input type="text" name="codepostal" class="form-control" id="codepostal" value="<?php echo $ligne["code_postal"]; ?>" required>
    </div>

    <div class="mb-2">
    <label class="form-label" for="ville">Ville:</label>
    <input type="text" class="form-control" name="ville" id="ville" value="<?php echo $ligne["ville"]; ?>" required>
    </div>

    <div class="mb-2">
    <label class="form-label" for="commentaire">Commentaire:</label>
    <textarea name="commentaire" class="form-control" id="commentaire" required><?php echo str_replace("<br />", "\r\n", $ligne["commentaire"]); ?></textarea>
    </div>

    <button type="submit" name="modifier" value="Modifier" class="btn btn-success mt-4">Envoyer</button>
</form>
</div>
</div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>