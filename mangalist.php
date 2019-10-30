<?php 
$title = "Manga List";
include 'header.php'; ?>

<!--section starts, change dynamically depending on page--->
<section>
  <?php 
  ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

  include 'control/main.php';
  foreach($mangalist as $manga) {
    $href= 'manga.php?id='.$manga->getId();
    $string = '<article style="cursor: pointer;" onclick="window.location=\'' . $href . '\';">
    <div class="img-container">
      <img src="oresama.jpg" alt="" />
    </div><h3>';
    $string .= $manga->getName() . '</h3>
    <ul class="genres">';
      foreach($manga->getGenres() as $genre) {
        $href= 'mangalist.php?genreid='.$genre->getId();
        $string .= '<li><a href="'.$href.'">' . $genre->getName() . '</a></li>';
      }
      $string .= '</ul> 
    <p class="num"><span>';
    $string .= count($manga->getVolumes()).' volume';
    $string .= count($manga->getVolumes()) > 1? 's' : '';
    $string .= "</span><span>";
    $string .= $manga->getAuthor().'</span></p>
  </article>';
  echo $string;
  }
  
 ?>
</section>
<?php include 'footer.php'; ?>