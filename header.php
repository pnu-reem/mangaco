<!DOCTYPE html>
<html>
  <head>
    <title>
      Mangaco | <?php echo $title; ?>
    </title>
    <link rel="stylesheet" href="css/style.css" /> <!--stylesheet goes here--->
  </head>
  <body>
    <!--header starts--->
    <header>
      <div id="up">
        <ul>
          <li><a href="login.php">Login</a></li>
          <li><a href="#">Logout</a></li>
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
      </ul>
    </nav>
