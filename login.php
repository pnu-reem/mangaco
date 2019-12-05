<?php 
$title = "Login or Register";
$extra = " <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/css/all.min.css'>
<link rel='stylesheet' href='css/login.css'>";

include 'header.php'; 
if($_SERVER['REQUEST_METHOD'] == 'POST') {
  try {
    $connStr = "mysql:host=localhost;dbname=manga";
    $user = "gin";
    $pass = "reem";
    $pdo = new PDO($connStr, $user, $pass);
    // Login
    if(isset($_POST["loginform"])) {
      $login = "SELECT * FROM `User` WHERE `email` = :email AND `password` = :pass";
      $statement = $pdo->prepare($login);
      $statement->bindValue(":email", $_POST["email"]);
      $statement->bindValue(":pass", $_POST["pass"]);
      $statement->execute();
      if($row = $statement->fetch()) {
        $_SESSION["user_id"] = $row["id"];
        header("Location: mangalist.php");
      }
    }
    // Register
    else if(isset($_POST["registerform"])) {
      $register = "INSERT INTO `User`(`email`, `username`, `password`) VALUES (:email, :username, :pass)";
      $statement = $pdo->prepare($register);
      $statement->bindValue(":email", $_POST["email"]);
      $statement->bindValue(":username", $_POST["username"]);
      $statement->bindValue(":pass", $_POST["pass"]);
      $statement->execute();
      $userid = $pdo->lastInsertId();
      $_SESSION["user_id"] = $userid;
      header("Location: mangalist.php");

    }
    
  } catch(PDOException $e) {
    die($e->getMessage());
  }
}

?>
<!--section starts, change dynamically depending on page--->
<section>
	<div class="clear"> &nbsp;</div>
	<div class="clear"> &nbsp;</div>
<div class="container" id="container">


<!-- Start of Div Create Account  --> 
	<div class="form-container log-up-container">

		<form method="post" >
			<h2>Create Account</h2>
			<input type="hidden" name="registerform" />

			<br>
			<input type="text" name = "username" placeholder="UserName" />
			<input type="email" name = "email" placeholder="Email" />
			<input type="password" name = "pass" placeholder="Password" />

			<button>Register</button>
		</form>
	</div>
	<!-- End of Div Create Account  --> 



	
	 <!-- Start of Div Log in   --> 
	<div class="form-container log-in-container">
		<form method="post" >
			<h2>Login</h2>
			<input type="hidden" name="loginform" />

             <br>
			<input type="email" name = "email" placeholder="Email" />
			<input type="password" name = "pass" placeholder="Password" />
			 <!-- 	<a href="#">Forgot your password?</a>  --> 
			<button>Log In</button>
		</form>
	</div>
	 <!-- End of Div Log in   --> 







	<div class="overlay-container">
		<div class="overlay">

			<div class="overlay-panel overlay-left">
				<h2> Welcome back !</h2>
				<p>To Log in, enter your personal information</p>
				<button class="ghost" id="logIn"> Log In</button>
			</div>
				 <!-- End of Log In  --> 

			<div class="overlay-panel overlay-right">
				<h2>Hello, Friend Mangaco :) </h2>
				<p>Enter your personal details and start  with us</p>
				<button class="ghost" id="logUp">Register</button>
			</div>
				 <!-- End of Div Log Up --> 
		</div>
	</div>



</div>
 <!-- End of Div container 1 --> 



	<div class="clear"> &nbsp;</div>
	<div class="clear"> &nbsp;</div>


   <script  src="js/login.js"></script>
</section>
<?php include 'footer.php'; ?>