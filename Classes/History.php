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

    public function saveBid()
    {
        $name = $_POST["name"];
        $priceNoTax = $_POST["pricenotax"];
        $priceTax = $_POST["pricetax"];
        $description = $_POST["description"];

        $dbh = new PDO("mysql:dbname=bocal_shop;host=127.0.0.1", "root", "");
        $product = $dbh->prepare("INSERT INTO products (`name`, `price_no_tax`, `price_tax`, `description`) VALUES (? , ?, ?, ?)");
        $product->execute([$name, $priceNoTax, $priceTax, $description]);
        echo "Votre produit a été sauvegardé dans la base de données";
    }
}
