<?php

    $nom = "Menu"; 

    $array = [
        "Accueil" => "Home.php",
        "Enchère" => "Posts.php",
        "Connexion" => "Login.php",
        "Inscription" => "Register.php",
    ];

    function afficher_menu($nom, $array){
        foreach($array as $k => $v){
            echo " <a href=\"$v\">$k</a> |";
        }

        echo "<h1>VroumVroumBids<form action=''> <input type='text' name='recherche' placeholder='Rechercher'><input type='submit' name='search' value='search'></form> </h1>
         ";
    }

?>