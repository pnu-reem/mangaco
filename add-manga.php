<?php 
$title = "Add Manga";
include 'header.php'; 
include 'control/main.php';
if($_SERVER['REQUEST_METHOD'] == 'POST') {

  $title = $_POST["title"];
  $author = $_POST["author"];
  $desc = $_POST["desc"];
  $year = $_POST["year"];
  $tags = $_POST["tags"];
  try {
    $connStr = "mysql:host=localhost;dbname=manga";
    $user = "gin";
    $pass = "reem";
    $pdo = new PDO($connStr, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $args = array();

    // FILE UPLOAD
    $path = "images/";
    $target_file =  $path.basename($_FILES["image"]["name"]);

    $file=$_FILES['image']['name'];    
    $result = move_uploaded_file($_FILES['image']['tmp_name'],$target_file);

    // INSERT MANGA
    if ($result) {
      $pdo->beginTransaction();
      $insertManga = "INSERT INTO Manga(name, author, description, year, cover_image_filename) VALUES (?, ?, ?, ?, ?)";
      $statement = $pdo->prepare($insertManga);
      $statement->bindValue(1, $title);
      $statement->bindValue(2, $author);
      $statement->bindValue(3, $desc);
      $statement->bindValue(4, $year);
      $statement->bindValue(5, $target_file);
      $statement->execute();
      $mangaId = $pdo->lastInsertId();
      foreach($tags as $tag) {
        $insertGenreManga = "INSERT INTO GenreManga(genre_id, manga_id) values(?, ?)";
        $statement = $pdo->prepare($insertGenreManga);
        $statement->bindValue(1, $tag);
        $statement->bindValue(2, $mangaId);
        $statement->execute();
      }
      $pdo->commit();

    }
    else {
      echo "please select your file";
    }
    
  } catch(PDOException $e) {
    die($e->getMessage());
    $pdo->rollback();
  }
}

?>
<!--section starts, change dynamically depending on page--->
<section>
  <form method="POST" id="add-manga"  class="form" enctype="multipart/form-data">
  <div class="input-group">
    <label for="title">Title</label>
    <input name="title" type="text"/>
  </div>
  <div class="error" id="title-err"></div>

  <div class="input-group">
    <label for="author">Author</label>
    <input name="author" type="text" />
  </div>
  <div class="error" id="author-err"></div>

  <div class="input-group">
    <label for="desc">Description</label>
    <textarea name="desc"></textarea>
  </div>
  <div class="error" id="desc-err"></div>

  <div class="input-group">
    <label for="year">Publishing year</label>
    <input name="year"  type="number" />
  </div>
  <div class="error" id="year-err"></div>
  <div class="input-group">
    <label for="tags[]">Tags</label>
    <select multiple="true" name="tags[]">
      <?php 
      

      foreach($genrelist as $genre) {
        echo '<option value="'. $genre->getId() .'">'. $genre->getName() .'</option>';
      }
      ?>
    </select>
  </div>
  <div class="error" id="tags-err"></div>

  <div class="input-group">
    <label for="image">Cover Image</label>
    <input name="image"  id="image" type="file" />
  </div>
  <div class="error" id="img-err"></div>

  <div>
    <input type="submit" value="add" />
    <input type="reset" value="reset" />

  </div>
  </form>
</section>
<script>

  document.getElementById("add-manga").onsubmit = function(e) {
    e.preventDefault();
    var title =  document.getElementsByName("title")[0].value;
    var title_err = document.getElementById("title-err");
    title_err.innerText = "";

    var author =  document.getElementsByName("author")[0].value;
    var author_err = document.getElementById("author-err");
    author_err.innerText = "";

    var desc =  document.getElementsByName("desc")[0].value;
    var desc_err = document.getElementById("desc-err");
    desc_err.innerText = "";

    var tags =  document.getElementsByName("tags[]")[0].value;
    var tags_err = document.getElementById("tags-err");
    tags_err.innerText = "";


    var image =  document.getElementsByName("image")[0].value;
    var img_err = document.getElementById("img-err");
    img_err.innerText = "";


    var year =  document.getElementsByName("year")[0].value;
    if(image == "") {
      img_err.innerText = "image mustn't be empty"
    }
    if(author == "") {
      author_err.innerText = "author mustn't be empty"
    }
    if(title == "") {
      title_err.innerText = "title mustn't be empty"
    }
    if(desc == "") {
      desc_err.innerText = "desc mustn't be empty"
    }
    if(tags == "") {
      tags_err.innerText = "tags mustn't be empty"
    }

    var year =  document.getElementsByName("year")[0].value;
    var currentYear = new Date();
    currentYear = currentYear.getFullYear();
    var year_err = document.getElementById("year-err");
    year_err.innerText = "";

     if((year > currentYear || year < 1950)) {
      year_err.innerText = "year must be between 1950 and " + currentYear;
    } else {
      e.target.submit();
    }
  }
  
</script>
<?php include 'footer.php'; ?>