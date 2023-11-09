<?php
require __DIR__ . "/User.php";
class Profile extends User
{
    public int $age;
    public string $country;
    public function __construct($firstname, $lastname, $email, $password, $salesNumber, $age, $country)
    {
        parent::__construct($firstname, $lastname, $email, $password, $salesNumber);
        $this->age = $age;
        $this->country = $country;
    }


    public function renderProfile()
    {
        echo "<div class='profile'>
        <p> $this->firstname</p>
        <p> $this->lastname</p>
        <p> $this->email</p>
        <p> $this->password</p>
        <p> $this->salesNumber</p>

        </div>";
    }

    public function editProfile()
    {
        $dbh = new PDO("mysql:dbname=bocal_vroomvroombids;host=127.0.0.1", "root", "");
        $id = $dbh->query("SELECT id FROM users");
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $salesNumber = $_POST["salesnumber"];

        $sql = "UPDATE users SET firstname='$firstname', lastname='$lastname', email='$email', passwords='$password', sales_number='$salesNumber'  where id='2'";

        if ($dbh->query($sql) === TRUE) {
            echo "Yes ";
        }
    }
}
