<?php include('navbar.php'); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VroomVroomBids</title>
    <link rel="stylesheet" type="text/css" href="Register.css">
</head>


<?php

class Users
{
    protected $name;
    protected $firstname;
    protected $email;
    protected $password;

    public function __construct($name, $firstname, $email, $password)   
    {
        $this->name = $name;
        $this->firstname = $firstname;
        $this->email = $email;
        $this->password = $password;

    }

    public function getNom()
    {
        return $this->name;
    }

    public function getPrenom()
    {
        return $this->firstname;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getMotDePasse()
    {
        return $this->password;
    }

} ?>
<?php include('footer.php'); ?>