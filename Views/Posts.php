<?php
$servername = "127.0.0.1";
$dbname = "bocal_vroomvroombids";
$username = "root";
$password = "root";

error_reporting(E_ALL);
ini_set("display_errors", 1);

$conn = new PDO("mysql:host=$servername;port=8889;dbname=$dbname", $username, $password);

// infos users et enchère
$details = $conn->query("SELECT id, firstname, lastname FROM users");
$voitures = $details->fetch();
$reponse = $conn->query('SELECT id, model, brand, power, years, descriptions, min_price, date_end, winner_id FROM post');
$posts = $reponse->fetch();

// formulaire soumis ?
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Calcul du nouveau montant de l'enchère
    $customBidAmount = 0;

    if (isset($_POST['cent'])) {
        $customBidAmount += 100;
    } elseif (isset($_POST['cinq-cents'])) {
        $customBidAmount += 500;
    } elseif (isset($_POST['mille-cinq-cents'])) {
        $customBidAmount += 1500;
    } elseif (isset($_POST['deux-mille'])) {
        $customBidAmount += 2000;
    } elseif (isset($_POST['Encherir'])) {
        $customBidAmount += $_POST['bids'];
    }

    // Insérer l'enchère dans la table 'bids'
    $insertBid = $conn->prepare("INSERT INTO bids (user_id, post_id, price, date) VALUES (:user_id, :post_id, :price, NOW())");
    $insertBid->bindParam(':user_id', $voitures['id']);
    $insertBid->bindParam(':post_id', $posts['id']);
    $insertBid->bindParam(':price', $customBidAmount);
    $insertBid->execute();

    // Calcul du nouveau prix de départ
    $newMinPrice = $posts['min_price'] + $customBidAmount;

    // Mettre à jour le prix de l'annonce avec le nouveau montant de l'enchère
    $updatePostPrice = $conn->prepare("UPDATE post SET min_price = :min_price WHERE id = :post_id");
    $updatePostPrice->bindParam(':min_price', $newMinPrice);
    $updatePostPrice->bindParam(':post_id', $posts['id']);
    $updatePostPrice->execute();

    // Récupérer à nouveau les données post mises à jour
    $reponse = $conn->query('SELECT id, model, brand, power, years, descriptions, min_price, date_end, winner_id FROM post');
    $posts = $reponse->fetch();

    // Tentez la redirection côté serveur
    header("Location: ".$_SERVER['PHP_SELF']);
    
    // Si redirection côté serveur échoue, JavaScript pour rediriger côté client
    echo "<script>window.location.href = '".$_SERVER['PHP_SELF']."';</script>";
    
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bonjour.css">
    <title>Document</title>
    <script>
        // Actualisez la page toutes les 30 secondes
        setInterval(function(){
            location.reload();
        }, 30000);
    </script>
</head>
<body>
<?php 
include '../Navigation/Menu.php'
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
                ";
            ?>

            <form action="Posts.php">
                <input type="number" name='bids' placeholder="Entrer votre montant">
                <input type="submit" class='Btn' name="Encherir"value="Encherir">
            </form>
        
        </div>
    </div>
</div>

<?php 
require_once __DIR__."/../Navigation/Footer.php";
?>

</body>
</html>