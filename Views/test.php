<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="views.css">
    <title>Document</title>
</head>

<body>

    <!-- <form method="POST" action="test.php">
        <input type="text" name="firstname" placeholder="Firstname" />
        <input type="text" name="lastname" placeholder="Lastname" />
        <input type="text" name="email" placeholder="Email" />
        <input type="password" name="password" placeholder="Password" />
        <input type="number" name="salesnumber" placeholder="Sales Number" />
        <input type="submit" value="Aller" />
    </form> -->

    <!-- <form method="POST" action="test.php">
        <input type="text" name="model" placeholder="Model" />
        <input type="text" name="brand" placeholder="Brand" />
        <input type="number" name="power" placeholder="Power" />
        <input type="date" name="year" placeholder="Date" />
        <input type="text" name="description" placeholder="Description" />
        <input type="number" name="minPrice" placeholder="Min Price" />
        <input type="date" name="dateEnd" placeholder="Date End" />
        <input type="submit" value="Aller" />
    </form> -->

    <form method="POST" action="test.php">
        <input type="date" name="date" placeholder="Date" />
        <input type="price" name="price" placeholder="Price" />
        <input type="submit" value="Aller" />
    </form>


    <?php





    // if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //     include __DIR__ . "/../Classes/User.php";
    //     $myUser = new User($_POST["firstname"], $_POST["lastname"], $_POST["email"], $_POST["password"],  $_POST["salesnumber"]);
    //     $myUser->saveUser();
    //     $myUser->renderUser();
    // }

    // if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //     include __DIR__ . "/../Classes/Post.php";
    //     $myPost = new Post($_POST["model"], $_POST["brand"], $_POST["power"], $_POST["year"],  $_POST["description"], $_POST["minPrice"], $_POST["dateEnd"]);
    //     $myPost->savePost();
    //     $myPost->renderPost();
    // }

    // if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //     include __DIR__ . "/../Classes/Profile.php";
    //     $myProfile = new Profile($_POST["firstname"], $_POST["lastname"], $_POST["email"],  $_POST["password"],  $_POST["salesnumber"],  6,  "hello");
    //     $myProfile->renderProfile();
    //     $myProfile->editProfile();
    // }

    function getWinnerId()
    {
        try {
            $conn = new PDO("mysql:dbname=bocal_vroomvroombids;host=127.0.0.1", "root", "");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO bids (user_id, post_id, price, dates)
      VALUES ('2', '3', '1245786', '2014/12/05')";
            $conn->exec($sql);
            $last_id = $conn->lastInsertId();
            echo "Le gagnant de l'enchère est l'utilisateur : " . $last_id;
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }

        $conn = null;
    }


    ?>

</body>

</html>