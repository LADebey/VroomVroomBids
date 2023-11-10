<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Home.css">
    <title>Home</title>
</head>

<body>
    <video autoplay muted loop id="myVideo">
        <source src="../../Media/car.mp4" type="video/mp4">
    </video>
    <a href=""><img id='logo' src='https://cdn.discordapp.com/attachments/1171733145700282409/1171742236124389376/f43a35e4-54ac-4efe-ab61-97a08b23cfe5.jpeg?ex=655dc8ff&is=654b53ff&hm=fafae2e4bd3c319ad600160edf7bfd689bf543cb71be86d4afc8c8ae4316f182&' alt=''></a>
    <?php
    include('../../Navigation/Menu.php');
    ?>
    <div class="container"></div>

    <?php
    include __DIR__ . "/../../Navigation/Footer.php";

    ?>
</body>

</html>