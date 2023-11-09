<?php require_once __DIR__ . "/Registerclass.php"; ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S'inscrire</title>
    <link rel="stylesheet" href="Style/style.css">

</head>

<body>

    <?php

    $monUsers = new Users(
        $_POST["name"],
        $_POST["firstname"],
        $_POST["email"],
        $_POST["password"],
    );
    ?>

    <h2>Votre compte vient d'être créé</h2>

    <li>Nom :
        <?php echo $monUsers->getNom(); ?>
    </li>
    <li>Prénom :
        <?php echo $monUsers->getPrenom(); ?>
    </li>
    <li>Email :
        <?php echo $monUsers->getEmail(); ?>
    </li>

    <!-- read the data from the database -->
    <?php
    $bdd = new PDO("mysql:host=127.0.0.1;port=8889;dbname=bocal_vroomvroombids", "root", "root"); // Apple
    // $bdd = new PDO("mysql:host=127.0.0.1;port=3306;dbname=bocal_vroomvroombids", "root", ""); // Windows

    $result = $dbh->prepare('SELECT * FROM users WHERE firstname=:nom AND lastname=:prenom AND email=:email AND password=:motDePasse');

    $result->bindValue(':nom', $monUsers->getNom(), PDO::PARAM_STR);
    $result->bindValue(':prenom', $monUsers->getPrenom(), PDO::PARAM_STR);
    $result->bindValue(':email', $monUsers->getEmail(), PDO::PARAM_STR);
    $result->bindValue(':motDePasse', $monUsers->getMotDePasse(), PDO::PARAM_STR);

    $result->execute();

    $results = $result->fetchAll(); ?>

    <!-- write the data into the database -->

    <?php
    $bdd = new PDO("mysql:host=127.0.0.1;port=8889;dbname=bocal_vroomvroombids", "root", "root"); // Apple
    // $bdd = new PDO("mysql:host=127.0.0.1;port=3306;dbname=bocal_vroomvroombids", "root", ""); // Windows


    // Prepare the SQL query
    $sql = "INSERT INTO users (firstname, lastname, email, password) VALUES (:prenom, :nom, :email, :motDePasse)";
    $stmt = $dbh->prepare($sql);

    // Bind the values to the parameters in the query
    $stmt->bindValue(':nom', $monUsers->getNom());
    $stmt->bindValue(':prenom', $monUsers->getPrenom());
    $stmt->bindValue(':email', $monUsers->getEmail());
    $stmt->bindValue(':motDePasse', $monUsers->getMotDePasse());

    // Execute the query
    $stmt->execute(); ?>

</body>
<?php include('footer.php'); ?>

</html>