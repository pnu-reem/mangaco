<?php
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
class Manga {
  public static $count = 0;
  private $id;
  private $name;
  private $author;
  private $description;
  private $year;
  private $genres;
  private $volumes;

  const LOWEST_ALLOWED_DATE = 1950;
  const HIGHEST_ALLOWED_DATE = 2019;


  function __construct($name, $author, $desc, $year) {
    $this->genres = array();
    $this->volumes = array();
    $this->setId();
    $this->setName($name);
    $this->setAuthor($author);
    $this->setDescription($desc);
    $this->setYear($year);
    self::$count++;
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
  public function getGenres() {
    return $this->genres;
  }

  public function getVolumes() {
    return $this->volumes;
  }


  public function setId() {
    $this->id = self::$count;
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

  public function addGenre($genre) {
      $this->genres[$genre->getId()] = $genre;
  }

  public function deleteGenre($id) {
    unset($this->genres[$id]);
  }

  public function addVolume($volume) {
    $this->volumes[$volume->getId()] = $volume;
}

public function deleteVolume($id) {
  unset($this->volumes[$id]);
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
    $string .= "</p><p>volumes: ";
    foreach($this->volumes as $volume) {
      $string .=  $volume;
    }
    $string .= "</p>";


    return $string; 
  }
}
?>