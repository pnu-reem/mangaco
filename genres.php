<?php 
$title = "Genres";
include 'header.php'; ?>
<!--section starts, change dynamically depending on page--->
<section>
<?php 
  ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

  include 'control/main.php';
  foreach($genrelist as $genre) {
    $href= 'mangalist.php?genreid='.$genre->getId();
    $string = '<article style="cursor: pointer;" onclick="window.location=\'' . $href . '\';">
    <h3>' . $genre->getName() . '</h3>
    <p>' . $genre->getDescription() .'</p></article>';
    echo $string;
  }
?>
</section>
<?php include 'footer.php'; ?>