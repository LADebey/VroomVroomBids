<?php include('navbar.php'); ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S'inscrire</title>
    <link rel="stylesheet" href="Style/style.css">

</head>

<body>
<div class="front">
    <h1>Création de compte</h1>
    <br>
    <h2>Renseignez votre profil</h2>

    <form action="RegisterDisplay.php" method="POST">

        <input type="text" name="name" placeholder="Nom" />
        <input type="text" name="firstname" placeholder="Prénom" />
        <input type="email" name="email" placeholder="Email" />
        <input type="password" name="password" placeholder="Mot de Passe" />
        <button type="submit" class="button">S'inscrire</button>

    </form>
</div>

</body>
<?php include('footer.php'); ?>

</html>