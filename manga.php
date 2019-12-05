<?php 
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
$id = $_GET['id'];
include 'control/main.php';
$manga = $mangalist[$id];
$title = $manga->getName();
include 'header.php'; 
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
    $manga->setIsFavourite(false);
  }
  // favourite
  else if(isset($_GET["fav"])) {
    $fav = "INSERT INTO Favourite(manga_id, `user_id`) VALUES (:mid, :uid)";
    $statement = $pdo->prepare($fav);
    $statement->bindValue(":mid", $_GET["id"]);
    $statement->bindValue(":uid", $_SESSION["user_id"]);
    $statement->execute();
    $manga->setIsFavourite(true);
  }
  
} catch(PDOException $e) {
  die($e->getMessage());
}
?>
<!--section starts, change dynamically depending on page--->
<section class="manga">
  <h2><?php echo $manga->getName();
  if(isset($_SESSION["user_id"])) {
    echo '<a class="heart ';
    if($manga->getIsFavourite()) {
      $href= 'manga.php?unfav&id='.$manga->getId();
      echo'favourited" href="' . $href . '">&#9829</a>';
    } else {
      $href= 'manga.php?fav&id='.$manga->getId();;
      echo '"href="' . $href . '">&#9829</a>';
    }
  }
  ?></h2>
  <div class="container">
    <div class="img-container">
    <img src="<?php echo $manga->getCoverImage() ?>" alt="<?php echo $manga->getCoverImage() ?>" />
    </div>
    <div>
      <p><?php echo $manga->getDescription(); ?><p>
      <table>
        <tr>
          <td><strong>Genre:</strong></td>
          <td>
            <ul id="genres">
              <?php
              foreach($manga->getGenres() as $genre) {
                $href= 'mangalist.php?genreid='.$genre->getId();
                echo '<li><a href="'.$href.'">' . $genre->getName() . '</a>, </li>';
              }
              ?>
            </ul>
          </td>
        </tr>
        <tr>
          <td><strong>author:</strong></td>
          <td><?php echo $manga->getAuthor(); ?></td>
        </tr>
        <tr>
          <td><strong>year:</strong></td>
          <td><?php echo $manga->getYear(); ?></td>
        </tr>
      </table>
    </div>
  </div>
</section>
<?php include 'footer.php'; ?>