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
    <link rel="stylesheet" href="bonjour.css">
    <title>Document</title>
</head>
<body>
    
<a href="../Views/Home/Home.php"><img id='logo' src='https://cdn.discordapp.com/attachments/1171733145700282409/1171742236124389376/f43a35e4-54ac-4efe-ab61-97a08b23cfe5.jpeg?ex=655dc8ff&is=654b53ff&hm=fafae2e4bd3c319ad600160edf7bfd689bf543cb71be86d4afc8c8ae4316f182&' alt=''></a>

<?php 
require_once __DIR__."/../Navigation/Menu.php";
?>

<div class="un">
    <div class="deux">
        <img class="voitures" src="https://cdn.lesanciennes.com/3/b/3ba41fe32ccb27a32a39003947416628.jpg?_gl=1*7pt8n*_ga*MTQ2Nzg0MTgwMC4xNjk5NjIwNDAw*_ga_W958ERVRNW*MTY5OTYyMDQwMC4xLjEuMTY5OTYyMDQwNC41Ni4wLjA.jpg" alt="">
    </div>
    
    <div class="trois">
        <div class="quatre">
            <div>
            <p>Détails :</p>
                    <?php echo "Nom : ". $voitures['firstname']. "<br>";?>
                    <?php echo "Prénom : ". $voitures['lastname']; ?>
            </div>

            
            
                <?php echo "Prix de départ : " . $posts['min_price']."€ <br>";?>
                <?php echo "Description produit : " .$posts['descriptions']; ?>
                <?php $date = $posts['date_end'];?>
            
        </div>
        <div class="cinq">
            <p>Enchère :</p>
            <p id="demo"></p>
            
            <script>

                var date = '<?php echo $date;?>';

                console.log(date);

                var heure = '13:00:00';

                var countDownDate = new Date( date).getTime();

                var x = setInterval(function() {

                var now = new Date().getTime();

                var distance = countDownDate - now;

                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                document.getElementById("demo").innerHTML = days + "d " + hours + "h "
                + minutes + "m " + seconds + "s restant";

                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("demo").innerHTML = "Enchère terminée.";
                }
                }, 1000);
            </script>

            <?php
                if(isset($_POST['cent'])){
                    $posts('INSERT INTO histories() ');
                    echo $posts['min_price'] + 100;
                }
                if(isset($_POST['cinq-cents'])){
                    echo $posts['min_price'] + 500;
                }
                if(isset($_POST['mille-cinq-cents'])){
                    echo $posts['min_price'] + 1500;
                }
                if(isset($_POST['deux-mille'])){
                    echo $posts['min_price'] + 2000;
                }
                echo "
                <form method='POST'>
                <input type='submit' class='Btn' name='cent' value='+ 100€'>
                <input type='submit' class='Btn' name='cinq-cents' value='+ 500€'>
                <input type='submit' class='Btn' name='mille-cinq-cents' value='+ 1 500€'>
                <input type='submit' class='Btn' name='deux-mille' value='+ 2 000€'> 
                <input type='submit' class='Btn' name='valider' value='valider'><br>
                ";
            ?>

            <form action="Posts.php">
                <input type="number" name='bids' placeholder="Entrer votre montant à enchérir">
                <input type="submit" class='Btn' value="Encherir">
            </form>
        
        </div>
    </div>
</div>

<?php 
require_once __DIR__."/../Navigation/Footer.php";
?>

</body>
</html>