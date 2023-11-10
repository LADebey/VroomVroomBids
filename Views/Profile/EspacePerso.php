<?php include("Menu.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Espace personnel</title>
</head>

<body>
    <?php
    require_once __DIR__ . "/../Navigation/Menu.php";
    ?>
    <h1>Espace personnel</h1>

    <h2>Enchères remportées</h2>
    <ul>
        <?php
        // Code pour récupérer et afficher les enchères remportées par l'utilisateur
        ?>
    </ul>

    <h2>Modifier le profil</h2>
    <form action="ModifierProfile.php" method="post">
        <label for="lastname">Nom :</label>
        <input type="text" name="lastname" value="<?php echo $nom; ?>" required><br>
        <label for="firstname">Prénom :</label>
        <input type="text" name="firstname" value="<?php echo $prenom; ?>" required><br>
        <label for="email">Email :</label>
        <input type="email" name="email" value="<?php echo $email; ?>" required><br>
        <label for="password">Nouveau mot de passe :</label>
        <input type="password" name="password"><br>
        <input type="submit" value="Modifier le profil">
    </form>
</body>

</html>