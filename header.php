<?php 
include_once "control/session.php";
  if(isset($_GET["logout"])) {
    session_destroy();
    header("Location: mangalist.php");
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>
      Mangaco | <?php echo $title; ?>
    </title>
    <link rel="stylesheet" href="css/style.css" /> <!--stylesheet goes here--->
    <?php 
      if($extra != null) {
        echo $extra;
      }
    ?>
    

  </head>
  <body>
    <!--header starts--->
    <header>
      <div id="up">
        <ul>
          <?php if(isset($_SESSION["user_id"])):?>
            <li><a href="mangalist.php?favourite">Favourite</a></li>
            <li><a href="add-manga.php">Add manga</a></li>
            <li><a href="mangalist.php?logout">Logout</a></li>
          <?php else: ?>
            <li><a href="login.php">Login</a></li>
          <?php endif;?>
        </ul>
          <form method="GET" action="mangalist.php">
            <input type="text" placeholder="Search.." name="title">
            <input type="submit" value="Submit" />
          </form>
      </div>
        
      <h1>MANGACO</h1>
    </header>
    <nav>
      <ul>
        <li><a href="mangalist.php">All</a></li>
        <li><a href="genres.php">Genres</a></li>
        <li><a href="advanced-search.php">Advanced Search</a></li>
      </ul>
    </nav>