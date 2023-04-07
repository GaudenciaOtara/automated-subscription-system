<?php 
session_start();
include 'Functions/connect.php';
 
if (isset($_POST['login'])){
    
	// echo $_POST['email'];
	// echo $_POST['password'];
	$user_query = mysqli_query($conn,"select * from user_registrations where email='{$_POST["email"]}' and password='{$_POST["password"]}'");
	$user_data = mysqli_fetch_assoc($user_query);
  
	if(empty($user_data)){
	  echo "user not found";
	}else{
	  $_SESSION["user"] = $user_data['email'];
	  echo("
		<script>
		  window.location.replace('Dashboard/index.php');
		</script>
	  ");
	}
  
  }
  
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>LogIn</title>
	<link rel="stylesheet" href="css/login.css">
</head>
<body>
	<div class="form">
	<h4>Log In</h4>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
		<input type="email" name="email" placeholder="Email" required><br>
		<input type="password" name="password" placeholder="Password" required>
		<a href="signup.php"><p>Don't have an account? Sign Up</a></p><p class="forgotpassword"><a href="#">Forgot Password?</p></a>
		<!-- <a href="signup.php"></a> -->
		
        <button name="login">Log In</button>
	</form>
	</div>
</body>
</html>