<?php

    $servername = "localhost";
    $dbname = "bocal_vroumvroumbids";
    $username = "root";
    $password = "root";

    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $details = $conn->query("SELECT id, firstname, lastname FROM users");
    $voitures = $details->fetch();
    $reponse = $conn->query('SELECT id, model, brand, power, years, descriptions, min_price, date_end, winner_id FROM post');
    $posts = $reponse->fetch();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    include_once __DIR__. "./Classes/Post.php";
    ?>
</body>
</html>