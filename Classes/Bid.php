<?php
class History
{
    public string $user;
    public $date;
    public float $price;

    public function __construct($user, $date, $price)
    {
        $this->user = $user;
        $this->date = $date;
        $this->price = $price;
    }

    public function renderHistory()
    {
        $dbh = new PDO("mysql:dbname=bocal_vroomvroombids;host=127.0.0.1", "root", "");
        $history = $dbh->query("SELECT h. user_id, b. price, dates FROM bids b LEFT JOIN histories h ON b.id = h.bid_id;");
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
