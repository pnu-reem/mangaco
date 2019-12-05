<?php 
$title = "Advanced Search";
include 'header.php'; ?>
<!--section starts, change dynamically depending on page--->
<section>
  <form method="GET" action="mangalist.php" id="advanced-search"  class="form">
  <div class="input-group">
    <label for="title">Title</label>
    <input name="title" type="text" placeholder="enter manga title" />
  </div>
  <div class="input-group">
    <label for="author">Author</label>
    <select name="author">
      <option value="" selected="true">select...</option>
      <?php include'control/main.php'; 
      foreach($mangalist as $manga) {
        echo '<option>'. $manga->getAuthor() .'</option>';
      }
        ?>
    </select>
  </div>
  <div class="input-group">
    <label for="desc">Description</label>
    <input name="desc" type="text" placeholder="search description" />
  </div>
  <div class="input-group">
    <label for="year">Publishing year</label>
    <input name="year"  type="number" placeholder="enter year" />
  </div>
  <div class="error" id="year-err"></div>
  <div class="input-group">
    <label for="tags">Tags</label>
    <select multiple="true" name="tags[]">
      <?php
      foreach($genrelist as $genre) {
        echo '<option value="'. $genre->getId() .'">'. $genre->getName() .'</option>';
      }
      ?>
    </select>
  </div>
  <div>
    <input type="submit" value="search" />
    <input type="reset" value="reset" />

  </div>
  </form>
</section>
<script>
  document.getElementById("advanced-search").onsubmit = function(e) {
    e.preventDefault();
    var year =  document.getElementsByName("year")[0].value;
    var currentYear = new Date();
    currentYear = currentYear.getFullYear();
    var year_err = document.getElementById("year-err");
     if((year > currentYear || year < 1950) && year != "" ) {
      year_err.innerText = "year must be between 1950 and " + currentYear;
    } else {
      e.target.submit();
    }
  }
  
</script>
<?php include 'footer.php'; ?>