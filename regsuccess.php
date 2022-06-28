<?php
	// ACHTUNG, gleicher Login Form, nur mit zusätzlichen success message auf Zeile 34.
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

			header("Location: index.php");
		}
		else 
		{
		echo "Ungültige Anmeldedaten. Versuchen Sie es noch einmal!";
		header("Location: login.php");
		}
		}
	include_once 'header.php'; // unser Header, muss hier platziert sein, sonst klappt session start nicht!
	include_once 'navbar.php';
?>
<center><h4 style="color:#008000">You have been successfully registered!</h4><p>You can now log in below</p></center>

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
