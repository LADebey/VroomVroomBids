<?php

    $servername = "localhost";
    $dbname = "bocal_vroumvroumbids";
    $username = "root";
    $password = "root";

    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $sql = 'SELECT id, model, brand, power, years, descriptions, min_price, date_end, winner_id FROM post';

    $voitures = $conn->query("SELECT id, firstname, lastname FROM users");
    $posts = $conn->query($sql);
   

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="voila.css">
    <title>Document</title>
</head>
<body>

<img src='https://cdn.discordapp.com/attachments/1171733145700282409/1171742236124389376/f43a35e4-54ac-4efe-ab61-97a08b23cfe5.jpeg?ex=655dc8ff&is=654b53ff&hm=fafae2e4bd3c319ad600160edf7bfd689bf543cb71be86d4afc8c8ae4316f182&' alt=''> 

<?php 
require_once __DIR__."/../Navigation/Menu.php";
afficher_menu($nom, $array);
?>

<div class="un">
    <div class="deux">
    <img src='https://cdn.discordapp.com/attachments/1171733145700282409/1171742236124389376/f43a35e4-54ac-4efe-ab61-97a08b23cfe5.jpeg?ex=655dc8ff&is=654b53ff&hm=fafae2e4bd3c319ad600160edf7bfd689bf543cb71be86d4afc8c8ae4316f182&' alt=''>
    </div>
    
    <div class="trois">
        <div class="quatre">
            <div>
            <p>Détails :</p>

            <?php if (is_array($voitures)) {
                foreach ($voitures as $voiture) {
                    echo "Nom : ". $voiture['firstname'];
                }
            } else {
                foreach ($voitures as $voiture) {
                    echo "Nom : ". $voiture['firstname']. "<br>";
                    echo "Prénom : ". $voiture['lastname'];
                }
                    }
            ?>
            </div>

            
            <?php foreach($posts as $post):?>
                <?php echo "Prix de départ : " . $post['min_price']."€ <br>";?>
                <?php echo "Description produit : " .$post['descriptions']; ?>
            <?php endforeach;?>
            
        </div>
        <div class="cinq">
            <p>Enchère :</p>
            <p id="demo"></p>
            <?php $currentDate = date('Y-m-d'); ?>
            <script>

                var countDownDate = new Date("2023 Nov 12, 12:00:00").getTime();

                var x = setInterval(function() {

                var now = new Date().getTime();

                var distance = countDownDate - now;

                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                document.getElementById("demo").innerHTML = days + "d " + hours + "h "
                + minutes + "m " + seconds + "s restant.";

                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("demo").innerHTML = "Enchère terminée.";
                }
                }, 1000);
            </script>

            <?php
                /* if(isset($_POST['cent'])){
                    echo "$enchère['prix']" + 100;
                }
                if(isset($_POST['cinq-cents'])){
                    echo "$enchère['prix']" + 500;
                }
                if(isset($_POST['mille-cinq-cents'])){
                    echo "$enchère['prix']" + 1500;
                }
                if(isset($_POST['deux-mille'])){
                    echo "$enchère['prix']" + 2000;
                } */
                echo "
                <form method='POST'>
                <input type='submit' class='Btn' name='cent' value='+ 100€'>
                <input type='submit' class='Btn' name='cinq-cents' value='+ 500€'>
                <input type='submit' class='Btn' name='mille-cinq-cents' value='+ 1 500€'>
                <input type='submit' class='Btn' name='deux-mille' value='+ 2 000€'> <br>
                "
            ?>

            <form action="Posts.php">
                <input type="number" name='bids' placeholder="Entrer votre montant à enchérir">
                <input type="submit" value="Encherir">
            </form>
        
        </div>
    </div>
</div>


</body>
</html>