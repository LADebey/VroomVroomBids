<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une enchère/Mettre en vente</title>
</head>
<body>
 <!-- include ("Menu.php"); -->

 <div class="CreatePostContainer">
    <form class="CreatePostForm" action="Post.php" method="post">
        <label for="model">Modèle de la voiture:</label>
        <input type="text" name="model" placeholder="Corolla"/>
        <label for="brand">Constructeur de la voiture:</label>
        <input type="text" name="brand" placeholder="Toyota"/>
        <label for="power">Puissance:</label>
        <input type="text" name="power" placeholder="140"/>
        <label for="year">Année:</abel>
        <input type="number" name="year" placeholder="2023" min="1886" max="2024"placeholder="2023" />
        <label for="description">Description:</label>
        <input type="textarea" name="description" placeholder="Toyota Corolla Toyota Corolla Toyota Corolla Toyota Corolla"/>
        <label for="min_price">Prix minimum:</label>
        <input type="number" name="min_price" step="0.01" min="1" placeholder="8000"/>
        <label for="date_end">Date de fin de l'enchère:</label>
        <input type="date" name="date_end"/>
        <input type="submit"/>
    </form>

</body>
</html>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $myAuction = new Post (
        $_POST["model"], 
        $_POST["brand"], 
        $_POST["power"], 
        $_POST["year"],
        $_POST["description"],
        $_POST["min_price"],
        $_POST["date_end"]
        );
      $myAuction -> sauvegarde();
    }

$pdo = new PDO ("mysql:host=127.0.0.1;port=3306;dbname=bocal_vroomvroombids","root","");
$query = $pdo->prepare("SELECT * FROM post");
$query->execute();
$results = $query->fetchAll();?>









