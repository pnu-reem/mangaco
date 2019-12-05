<?php
// ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
include_once "session.php";

include 'manga.class.php';
include 'genre.class.php';

$mangalist = array();
$gerelist = array();

$title = isset($_GET["title"])? $_GET["title"] : null;
$author = isset($_GET["author"])? $_GET["author"] : null;
$desc = isset($_GET["desc"])? $_GET["desc"] : null;
$year = isset($_GET["year"])? $_GET["year"] : null;
$genreID = isset($_GET["genreid"])? $_GET["genreid"] : null;
$tags = isset($_GET["tags"])? $_GET["tags"] : null;
$favourite = isset($_GET["favourite"]);

try {
  $connStr = "mysql:host=localhost;dbname=manga";
  $user = "gin";
  $pass = "reem";
  $pdo = new PDO($connStr, $user, $pass);
  $args = array();
  // GET ALL MANGA
  $getMangalist = "SELECT m.id mi, m.name mn, m.author, m.description md, m.year, m.cover_image_filename, g.id gi, g.name gn,  g.description gd , f.user_id
  FROM Manga m JOIN GenreManga gm ON m.id = gm.manga_id JOIN Genre g ON gm.genre_id = g.id  LEFT JOIN Favourite f ON m.id = f.manga_id";
  
  if($title || $author || $desc || $year || $genreID || $tags || $favourite) {
    $getMangalist .= " WHERE ";
    $another = false;
    if($title != null) {
      $getMangalist .= " m.name LIKE :title ";
      $another = true;
      $args[":title"] = "%$title%";
    }
    if($favourite) {
      $getMangalist .= " f.user_id = :uid ";
      $another = true;
      $args[":uid"] = $_SESSION["user_id"];
    }
    if($author != null) {
      $getMangalist .= $another? " AND " : "";
      $getMangalist .= " m.author = :author ";
      $args[":author"] = $author;
    }
    if($desc != null) {
      $getMangalist .= $another? " AND " : "";
      $getMangalist .= " m.description LIKE :desc ";    
      $args[":desc"] = "%$desc%";
    }
    if($year != null) {
      $getMangalist .= $another? " AND " : "";
      $getMangalist .= " m.year = :year ";    
      $args[":year"] = $year;
    }
    if($genreID != null) {
      $getMangalist .= $another? " AND " : "";
      $getMangalist .= " g.id = :genreID ";    
      $args[":genreID"] = $genreID;
    }
    if($tags != null) {
      $getMangalist .= $another? " AND " : "";
      for($i = 0; $i < count($tags); $i++) {
        $getMangalist .= " g.id = :tags$i ";
        if($i != count($tags) - 1) {
          $getMangalist .= " OR ";
        }
        $args[':tags'.$i] = $tags[$i];
      }
    }
  }
 
  $statement = $pdo->prepare($getMangalist);
  foreach($args as $key => $value) {
    $statement->bindValue($key, $value);
  }
  $statement->execute();
  while($row = $statement->fetch()) {
    if(isset($mangalist[$row["mi"]])) {
      $mangalist[$row["mi"]]->addGenre(new Genre($row["gi"], $row["gn"], $row["gd"]));
    } else {
      $manga = new Manga($row["mi"], $row["mn"], $row["author"], $row["md"], $row["year"],  $row["cover_image_filename"]);
      $manga->addGenre(new Genre($row["gi"], $row["gn"], $row["gd"]));
      $mangalist[$row["mi"]] = $manga;
    }
    if(isset($_SESSION["user_id"]) && $row["user_id"] === $_SESSION["user_id"]) {
      $manga->setIsFavourite(true);
    }
  } 
  // GET ALL GENRE
  $getGenrelist = "SELECT * FROM Genre;";
  $result = $pdo->query($getGenrelist);
  while($row = $result->fetch()) {
    $genre = new Genre($row["id"], $row["name"], $row["description"]);
    $genrelist[$row["id"]] = $genre;
  }

} catch(PDOException $e) {
  die($e->getMessage());
}


?>