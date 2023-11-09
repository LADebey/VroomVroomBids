<?php
// $bdd = new PDO("mysql:host=127.0.0.1;port=8889;dbname=bocal_vroomvroombids", "root", "root"); // Apple
// $bdd = new PDO("mysql:host=127.0.0.1;port=3306;dbname=bocal_vroomvroombids", "root", ""); // Windows
try {
    $bdd = new PDO("mysql:host=127.0.0.1;port=8889;dbname=bocal_vroomvroombids", "root", "root");
    // $bdd = new PDO("mysql:host=127.0.0.1;port=3306;dbname=bocal_vroomvroombids", "root", ""); // Windows

} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nom = $_POST["name"];
    $prenom = $_POST["firstname"];
    $email = $_POST["email"];
    $mot_de_passe = password_hash($_POST["password"], PASSWORD_BCRYPT);
    // Vérification si une seule adresse mail
    $stmt = $bdd->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindValue(":email", $email, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $error = "L'adresse email est déjà utilisée. Veuillez en choisir une autre.";
    } else {
        $sql = "INSERT INTO users (firstname, lastname, email, password) VALUES (:firstname, :lastname, :email, :password)";
        $stmt = $bdd->prepare($sql);
        $stmt->bindValue(':lastname', $nom, PDO::PARAM_STR);
        $stmt->bindValue(':firstname', $prenom, PDO::PARAM_STR);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':password', $mot_de_passe, PDO::PARAM_STR);
        $results = $stmt->execute();
        var_dump($results);
        var_dump($stmt->errorInfo());
        if ($results) {
            $success = "Inscription réussie !";
        } else {
            $error = "Une erreur est survenue lors de l'inscription.";
        }
        header("Location: Home.php");
        exit;
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text css" href="Register.css">
</head>
<body>
    <h1>Inscription</h1>
    <?php
    if (!empty($error)) {
        echo "<div style='color: red;'>$error</div>";
    }
    if (!empty($success)) {
        echo "<div style='color: green;'>$success</div>";
    }
    ?>
    <form action="Register.php" method="post">
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
