<?php
class Post
{
    public string $model;
    public string $brand;
    public int $power;
    public $year;
    public string $description;
    public float $minPrice;
    public $dateEnd;

    public function __construct($model, $brand, $power, $year, $description, $minPrice, $dateEnd)
    {
        $this->model = $model;
        $this->brand = $brand;
        $this->power = $power;
        $this->year = $year;
        $this->description = $description;
        $this->minPrice = $minPrice;
        $this->dateEnd = $dateEnd;
    }

    public function savePost()
    {


        $dbh = new PDO("mysql:dbname=bocal_vroomvroombids;host=127.0.0.1", "root", "");
        $post = $dbh->prepare("INSERT INTO posts (model, brand, power, years, descriptions, min_price, date_end ) VALUES (? , ?, ?, ?, ?, ?, ?)");
        $post->execute([$this->model, $this->brand, $this->power, $this->year, $this->description, $this->minPrice, $this->dateEnd]);
        echo "Votre post a été sauvegardé dans la base de données";
    }

    public function renderPost()
    {

        $dbh = new PDO("mysql:dbname=bocal_vroomvroombids;host=127.0.0.1", "root", "");
        $post = $dbh->query("SELECT * FROM posts");
        $posts = $post->fetchAll(PDO::FETCH_ASSOC);

        echo "<div class='renderCont'>";
        foreach ($posts as $post) { ?>
            <?php echo "<div class='render'>"; ?>
            <p><?php echo "Modèle : ", $post['model'] ?></p>
            <p><?php echo "Marque : ", $post['brand'] ?></p>
            <p><?php echo "Puissance : ", $post['power'] ?></p>
            <p><?php echo "Date : ", $post['years'] ?></p>
            <p><?php echo "Description : ", $post['descriptions'] ?></p>
            <p><?php echo "Min Price : ", $post['min_price'] ?></p>
            <p><?php echo "Date End : ", $post['date_end'] ?></p>

<?php
            echo "</div>";
        }
        echo "</div>";
    }
}