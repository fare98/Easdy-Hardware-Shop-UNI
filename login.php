
<?php
	
	require("connection.php"); // mit Datenbank verbinden
	
	if(isset($_POST["submit"])) {
		$email = $_POST["email"];
		$password = $_POST["password"];

		$stmt = $connection->prepare("SELECT * FROM users WHERE email=:email");
		$stmt->bindParam(":email", $email);
		$stmt->execute();
		$userExists = $stmt->fetchAll();

		$passwordHashed = $userExists[0]["password"];
		$checkPassword = password_verify($password, $passwordHashed);

		if($checkPassword === true) {

			session_start();
			$_SESSION["email"] = $userExists[0]["email"];
			$_SESSION["id"] = $userExists[0]["id"];

			header("Location: index.php?login=success");
		}
		else 
		{
		header("Location: login.php?login=failed");
		}
		}
	include_once 'header.php'; // unser Header, muss hier platziert sein, sonst klappt session start nicht!
	include_once 'navbar.php';
?>


<?php
    $fullURL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; // <-- error message for incorrect login

    if(strpos($fullURL, "login=failed") == true) {
        echo '<center><h5 style="color:#FF0000">You have specified an incorrect password or email. Please try again.</h5><p></p></center>';
    }
?>

<div class="container mt-5 py-5" style="max-width: 500px">
 	<form action="login.php" method="post">
 	<h1 class="text-center mb-5">Login</h1>
 		<div class="form-group">
   			<input type="email" class="form-control" name="email" placeholder="Email" required>
		</div>  
		<div class="form-group">
    		<input type="password" class="form-control" name="password" placeholder="Password" required>
		</div>
	<div><button type="submit" name ="submit" class="btn btn-primary btn-lg btn-block">Login</button></div>
	</form>  
</div>  
 
 <?php
 
 include_once 'footer.php'; // unser Footer
 ?>

