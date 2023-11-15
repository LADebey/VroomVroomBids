<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Home.css">
    <title>Home</title>
</head>

<body>

    <?php
    include_once('../../Navigation/Menu/Menu.php');
    ?>

    <video autoplay muted loop id="myVideo">
        <source src="../../Media/car.mp4" type="video/mp4">
    </video>
    <iframe src="/VroomVroomBids/Media/silent(1).mp3" allow="autoplay" style="display:none"></iframe>
    <audio controls autoplay loop id="yesyes" style="display:none">
        <source src="/VroomVroomBids/Media/yesyes.mp3" type="audio/mpeg">
    </audio>




    <!-- <?php
            include __DIR__ . "/../../Navigation/Footer.php";

            ?> -->

</body>

</html>