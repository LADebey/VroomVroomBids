<?php
$bdd = new PDO("mysql:host=127.0.0.1;port=8889;dbname=bocal_vroomvroombids", "root", "root"); // Apple
// $bdd = new PDO("mysql:host=127.0.0.1;port=3306;dbname=bocal_vroomvroombids", "root", ""); // Windows

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST["name"];
    $prenom = $_POST["firstname"];
    $email = $_POST["email"];
    $mot_de_passe = password_hash($_POST["password"], PASSWORD_BCRYPT);

    // Vérification si une seule adresse mail
    $stmt = $bdd->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo "L'adresse email est déjà utilisée. Veuillez en choisir une autre.";
    } else {
        $sql = "INSERT INTO users (name, firstname, email, password) VALUES (?, ?, ?, ?)";
        $stmt = $bdd->prepare($sql);
        $stmt->execute([$nom, $prenom, $email, $mot_de_passe]);

        header("Location: Home.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="Register.css">
</head>
<body>
    <h1>Inscription</h1>
    <form action="traitement_inscription.php" method="post">
        <label for="name">Nom :</label>
        <input type="text" name="name" required><br>
        <label for="firstname">Prénom :</label>
        <input type="text" name="firstname" required><br>
        <label for="email">Email :</label>
        <input type="email" name="email" required><br>
        <label for="password">Mot de passe :</label>
        <input type="password" name="password" required><br>
        <input type="submit" value="S'inscrire">
    </form>
</body>
</html>
