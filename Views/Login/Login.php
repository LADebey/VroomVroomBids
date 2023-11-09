<?php
$bdd = new PDO("mysql:host=127.0.0.1;dbname=bocal_vroomvroombids;port=8889", "root", "root"); //Apple
// $bdd = new PDO ("mysql:host=127.0.0.1;port=3306;dbname=bocal_vroomvroombids","root",""); //Windows

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $mot_de_passe = $_POST["password"];

    // Vérifier les informations de l'utilisateur dans la base de données
    $stmt = $bdd->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(":email", $email);
    $stmt->execute();
    $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($utilisateur && password_verify($mot_de_passe, $utilisateur["password"])) {
        session_start();
        $_SESSION["users_id"] = $utilisateur["id"];
        //echo "connexion reussi";
        // Redirige user vers son espace personnel
        header("Location: espace_personnel.php");
       exit; // Termine le script après la redirection
    } else {
        echo "Identifiants incorrects. Veuillez réessayer.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="Login.css">
</head>
<body>
<div class="login">
    <header class="header">
        <span class="text">LOGIN</span>
        <span class="loader"></span>
    </header>
    <form class="form">  
        <input class="input" type="email" placeholder="Adresse e-mail">
        <input class="input" type="password" placeholder="Mot de passe">
        <button class="btn" type="submit"></button>
    </form>
</div>
    <a href="/VroomVroomBids/Views/Register/Register.php" class="resetbtn">Inscription</a>
    <script>
        $(document).ready(function() {
            $('.input').on('focus', function() {
                $('.login').addClass('clicked');
            });
            $('.login').on('submit', function(e) {
                e.preventDefault();
                $('.login').removeClass('clicked').addClass('loading');
            });
            $('.resetbtn').on('click', function(e){
                e.preventDefault();
                $('.login').removeClass('loading');
            });
        });
        </script>
</body>
</html>
