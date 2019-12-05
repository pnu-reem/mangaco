<?php
// ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
class Genre {
  private $id;
  private $name;
  private $description;


  function __construct($id, $name, $desc) {
    $this->setId($id);
    $this->setName($name);
    $this->setDescription($desc);
  }

  public function getId() {
    return $this->id;
  }
  public function getName() {
    return $this->name;
  }
  public function getDescription() {
    return $this->description;
  }


  public function setId($id) {
    $this->id = $id;
  }
  public function setName($name) {
    $this->name = $name;
  }

  public function setDescription($description) {
    $this->description = $description;
  }


  public function __toString() {
    $string = '';
    $string .= "<p>id: " . $this->id;
    $string .= "</p><p>name: " . $this->name;
    $string .= "</p><p>description: " . $this->description;
    return $string; 
  }
}

?>