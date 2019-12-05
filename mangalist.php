<?php 
$title = "Manga List";
include 'header.php';


?>

<!--section starts, change dynamically depending on page--->
<section>
  <?php 
  ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
  try {
    $connStr = "mysql:host=localhost;dbname=manga";
    $user = "gin";
    $pass = "reem";
    $pdo = new PDO($connStr, $user, $pass);
    // unfavourite
    if(isset($_GET["unfav"])) {
      $unfav = "DELETE FROM Favourite WHERE manga_id = :mid AND `user_id` = :uid";
      $statement = $pdo->prepare($unfav);
      $statement->bindValue(":mid", $_GET["id"]);
      $statement->bindValue(":uid", $_SESSION["user_id"]);
      $statement->execute();
    }
    // favourite
    else if(isset($_GET["fav"])) {
      $fav = "INSERT INTO Favourite(manga_id, `user_id`) VALUES (:mid, :uid)";
      $statement = $pdo->prepare($fav);
      $statement->bindValue(":mid", $_GET["id"]);
      $statement->bindValue(":uid", $_SESSION["user_id"]);
      $statement->execute();
    }
    
  } catch(PDOException $e) {
    die($e->getMessage());
  }
  
  include 'control/main.php';
  foreach($mangalist as $manga) {
    $href= 'manga.php?id='.$manga->getId();
    $string = '<article style="cursor: pointer;" onclick="window.location=\'' . $href . '\';">
    <div class="img-container">
      <img src="'.$manga->getCoverImage().'" alt="'.$manga->getCoverImage().'" />
    </div><h3>';
    $string .= $manga->getName() . '</h3>
    <ul class="genres">';
      foreach($manga->getGenres() as $genre) {
        $href= 'mangalist.php?genreid='.$genre->getId();
        $string .= '<li><a href="'.$href.'">' . $genre->getName() . '</a></li>';
      }
      $string .= '</ul> 
    <p class="num">';
    if(isset($_SESSION["user_id"])) {
      $string .= '<a class="heart ';
        $href = 'mangalist.php?' . (isset($_GET["favourite"]) ? "favourite&" : "");
      if($manga->getIsFavourite()) {
        $href .= 'unfav&id='.$manga->getId();
        $string .='favourited" href="' . $href . '">&#9829</a>';
      } else {
        $href .= 'fav&id='.$manga->getId();;
        $string .= '"href="' . $href . '">&#9829</a>';
      }
    }
    $string .= '<span>'.$manga->getAuthor().'</span></p>
  </article>';
  echo $string;
  }
  
 ?>
</section>
<?php include 'footer.php'; ?>