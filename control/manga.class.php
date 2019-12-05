<?php
// ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
class Manga {
  private $id;
  private $name;
  private $author;
  private $description;
  private $year;
  private $coverImage;
  private $isFavourite;
  private $genres;
  private $volumes;

  const LOWEST_ALLOWED_DATE = 1950;
  const HIGHEST_ALLOWED_DATE = 2019;


  function __construct($id, $name, $author, $desc, $year, $coverImage) {
    $this->genres = array();
    $this->volumes = array();
    $this->setId($id);
    $this->setName($name);
    $this->setAuthor($author);
    $this->setDescription($desc);
    $this->setYear($year);
    $this->setCoverImage($coverImage);
  }

  public function getId() {
    return $this->id;
  }
  public function getName() {
    return $this->name;
  }
  public function getAuthor() {
    return $this->author;
  }
  public function getDescription() {
    return $this->description;
  }
  public function getYear() {
    return $this->year;
  }
  public function getIsFavourite() {
    return $this->isFavourite;
  }
  public function getCoverImage() {
    return $this->coverImage;
  }
  
  public function getGenres() {
    return $this->genres;
  }



  public function setId($id) {
    $this->id = $id;
  }
  public function setName($name) {
    $this->name = $name;
  }
  public function setAuthor($author) {
    $this->author = $author;
  }
  public function setDescription($description) {
    $this->description = $description;
  }
  public function setYear($year) {
    if ($year >= self::LOWEST_ALLOWED_DATE && $year <= self::HIGHEST_ALLOWED_DATE) {
      $this->year = $year;
    }
    else {
      $this->year = date('Y');
    }
  }
  public function setIsFavourite($fav) {
    $this->isFavourite = $fav;
  }
  public function setCoverImage($coverImage) {
    $this->coverImage = $coverImage;
  }

  public function addGenre($genre) {
      $this->genres[$genre->getId()] = $genre;
  }

  public function deleteGenre($id) {
    unset($this->genres[$id]);
  }

  public function __toString() {
    $string = '';
    $string .= "<p>id: " . $this->id;
    $string .= "</p><p>name: " . $this->name;
    $string .= "</p><p>author: " . $this->author;
    $string .= "</p><p>description: " . $this->description;
    $string .= "</p><p>year: " . $this->year ."</p>";
    $string .= "</p><p>volumes: " . count($this->volumes);

    $string .= "</p><p>genres: ";
    foreach($this->genres as $genre) {
      $string .=  $genre->getName() .",";
    }
    $string .= "</p>";
    return $string; 
  }
}
?>