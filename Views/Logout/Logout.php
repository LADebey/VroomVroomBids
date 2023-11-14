<?php define('ROOT_PATH', './'); ?>
<?php include("Menu.php"); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VroomVroomBids</title>
    <link rel="stylesheet" type="text/css" href="Style/style.css">

</head>
<?php
require_once "../../Connexion.php";

session_start();

// Détruit toutes les variables de session
$_SESSION = array();

// Détruit la session
session_destroy();
echo "Vous êtes  déconnecté";

// Redirige vers la page de connexion
header("Location: Login.php");
exit;
?>
