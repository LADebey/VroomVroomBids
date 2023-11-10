<?php
include("../Navigation/Menu.php");

try {
    $bdd = new PDO("mysql:host=127.0.0.1;port=8889;dbname=bocal_vroomvroombids", "root", "root");
    // $bdd = new PDO("mysql:host=127.0.0.1;port=3306;dbname=bocal_vroomvroombids", "root", ""); // Windows
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

// Initialiser variables filtrage
$marque = isset($_POST["brand"]) ? $_POST["brand"] : '';
$modele = isset($_POST["model"]) ? $_POST["model"] : '';
$date_end = isset($_POST["date_end"]) ? $_POST["date_end"] : '';

// contruire requête SQL
$sql = "SELECT * FROM post WHERE 1";

// conditions de filtrage
if (!empty($marque)) {
    $sql .= " AND brand = :marque";
}
if (!empty($modele)) {
    $sql .= " AND model = :modele";
}
if ($date_end == 'en_cours') {
    $sql .= " AND date_end > NOW()";
} elseif ($date_end == 'terminees') {
    $sql .= " AND date_end <= NOW()";
}

// Préparation de la requête
$stmt = $bdd->prepare($sql);

// Remplacement des paramètres dans la requête
if (!empty($marque)) {
    $stmt->bindParam(':marque', $marque);
}

if (!empty($modele)) {
    $stmt->bindParam(':modele', $modele);
}

// Exécution de la requête
$stmt->execute();

// Récupération des résultats
$annonces = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="Filtre.css">
    <title>Filtrer les annonces</title>
</head>
<body>
    <div class="filtre">
        <div class="filtretat">
                <label for="date_end">Selectionnez un type d'enchères:</label>
                <select name="date_end">
                    <option value="en_cours" <?= ($date_end == 'en_cours') ? 'selected' : '' ?>>Enchères en cours</option>
                    <option value="terminees" <?= ($date_end == 'terminees') ? 'selected' : '' ?>>Enchères terminées</option>
                </select>
                <br>
            </div>

        <form action="filtre.php" method="post">
            <div class="filtremarque">
                <label for="brand">Et/Ou</label>
                <input type="text" name="brand" placeholder="Filtrer par Marque" value="<?= $marque ?>">
                <br>
            </div>

            <div class="filtremodele">
                <label for="model">Et/Ou</label>
                <input type="text" name="model" placeholder="Filtrer par Modèle" value="<?= $modele ?>">
                <br>
            </div>

            <input type="submit" value="Filtrer">
        </form>
    </div>
    <div class="cardannonce">
        <ul>
            <?php foreach ($annonces as $annonce) : ?>
                <li class="cardannonce">
                    <a href="annonce.php?id=<?= $annonce["id"] ?>">
                    <?= $annonce["brand"] ?> <?= $annonce["model"] ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>
