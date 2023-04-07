<?php
include 'Functions/connect.php';
if (isset($_POST['signup'])){
  $email = $_POST['email'];
  $fullname = $_POST['fullname'];
  $phonenumber = $_POST['phonenumber'];
  $password = $_POST['password'];


// Get current date and time
$registration_date = date('Y-m-d H:i:s');
 

 

// Increment count for current day in registrations_by_day table




  if ($conn->connect_error){
    die('Connection Failed!' .$conn->connect_error);
  }
  else{

    // $current_date = date('Y-m-d');
  //  $query = "UPDATE registrations_data SET count=count+1 WHERE day='$current_date'";
   
  // mysqli_query($conn, $query);
    // Check for existing email and phone number
    $check_query = "SELECT * FROM user_registrations WHERE email='$email' OR phonenumber='$phonenumber'";
    $check_result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
      // Display error message if email or phone number already exists
      if ($row = mysqli_fetch_assoc($check_result)) {
        if ($row['email'] == $email) {
          echo "<p style='color:red;'>Email already exists</p>";
        }
        if ($row['phonenumber'] == $phonenumber) {
          echo "<p style='color:red;'>Phone number already exists</p>";
        }
      }
    }
    else {
      // Insert new patient details into database
      $statement = $conn->prepare("INSERT INTO user_registrations(fullname,email,password,phonenumber,registration_date) VALUES(?,?,?,?,?)");
      $statement->bind_param("sssis",$fullname,$email,$password,$phonenumber,$registration_date);
      $statement->execute();
      echo "<p style='color:green;'>Successfully Registered!</p>";
      $statement->close();
      $conn->close();
      echo "
        <script>
          location.replace('login.php');
        </script>
      ";
    }
  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SignUp</title>
	<link rel="stylesheet" href="css/login.css">
</head>
<body>
	<div class="form">
	<h4>Sign Up</h4>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
		<input type="fullname" name="fullname" placeholder="Full Name" required><br>
		<input type="email" name="email" placeholder="Email" required><br>
		<input type="password" name="password" placeholder="Password" required>
		<input type="tel" name="phonenumber" placeholder="Phone Number" required><br>

		<a href="login.php"><p>Already have an account? Login</p></a>
        <button name="signup">Sign Up</button>
	</form>
	</div>
</body>
</html>