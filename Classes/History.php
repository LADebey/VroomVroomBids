<?php
class History
{
    public string $user;
    public $post;
    public $date;
    public float $price;

    public function __construct($user, $post, $date, $price)
    {
        $this->user = $user;
        $this->post = $post;
        $this->date = $date;
        $this->price = $price;
    }

    public function renderHistory()
    {
        require_once "../../Connexion.php";
        $history = $bdd->query("SELECT h. user_id, b. price, dates FROM bids b LEFT JOIN histories h ON b.id = h.bid_id;");
        $histories = $history->fetchAll(PDO::FETCH_ASSOC);

        echo "<div class='renderCont'>";
        foreach ($histories as $key1 => $value1) {
            echo "<div class='render'>";
            foreach ($value1 as $key2 => $value2) {
                echo "<p> $key2 : $value2 </p>";
            }
            echo "</div>";
        }
        echo "</div>";
    }
}
