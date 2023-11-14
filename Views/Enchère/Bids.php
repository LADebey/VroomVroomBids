<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    require_once "../../Connexion.php";
    
    $reponse = "SELECT id, model, brand, power, years, descriptions, min_price, date_end FROM post";
    $posts = $bdd->query($reponse);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Bids.css">
    <title>Document</title>
</head>
<body>

<a href="../Views/Home/Home.php"><img id='logo' src='https://cdn.discordapp.com/attachments/1171733145700282409/1171742236124389376/f43a35e4-54ac-4efe-ab61-97a08b23cfe5.jpeg?ex=655dc8ff&is=654b53ff&hm=fafae2e4bd3c319ad600160edf7bfd689bf543cb71be86d4afc8c8ae4316f182&' alt=''></a>

<?php 
require_once __DIR__."/../Navigation/Menu.php";
?>

<div class="bidouille">
        <?php foreach($posts as $post):?>
            <div class="machin">
                <ul>
                    <li>
                        <div class="truc">
                            <a href="/VroomVroombids/Views/Posts.php?id=<?php echo $post['id']?>"><img src="https://cdn.discordapp.com/attachments/1171733145700282409/1173604415459037254/corvette.jpg?ex=65648f49&is=65521a49&hm=357da93e8c5ee6d8b43296801290ae29daeacd80526c45e434aaa69171ef9d1b&" class="poulet" alt=""></a>
                        </div>

                        <div class="muche">
                            <p><?php echo "Modèle : ". $post['model']."<br>"; ?>
                            <?php echo "Marque : ". $post['brand']."<br>"; ?>
                            <?php echo "Puissance : ". $post['power']."hp <br>"; ?>
                            <?php echo "Année : ". $post['years']."<br>"; ?>
                            <?php echo "Détails produit : ". $post['descriptions']."<br>"; ?>
                            <?php echo "Prix d'enchère : ". $post['min_price']."€ <br>"; ?>
                            <?php echo "Fin d'enchère : ". $post['date_end']."<br>"; ?></p>
                            <p><a href="/VroomVroombids/Views/Posts.php?id=<?php echo $post['id']?>"><button class="info">En savoir plus ></button></a></p>
                        </div>

                    </li>
                </ul>
            </div>
        <?php endforeach;?>
</div>

</body>
</html>