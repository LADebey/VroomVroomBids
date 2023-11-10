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


        $sql = "UPDATE users SET firstname='$this->firstname', lastname='$this->lastname', email='$this->email', passwords='$this->email', sales_number='$this->email'  where id='2'";

        if ($dbh->query($sql) === TRUE) {
            echo "Yes ";
        }
    }
}
