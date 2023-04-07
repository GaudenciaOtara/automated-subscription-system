<?php 
session_start();
require "checksession.php";
include "connect.php";
check_session();

if (isset($_SESSION['user'])) {
    
    if(isset($_POST['submit'])) {
        $password = $_POST['password'];
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $phonenumber = $_POST['phonenumber'];

        // Check if a file was uploaded
        if(isset($_FILES['profile_picture']) && $_FILES['profile_picture']['name']) {

            // Set upload directory path
            $upload_dir = "../Dashboard/profileimages/";
          
            // Get the name of the uploaded file
            $file_name = $_FILES['profile_picture']['name'];
          
            // Get the temporary location of the uploaded file
            $tmp_file = $_FILES['profile_picture']['tmp_name'];
         
            // Move the uploaded file to the upload directory
            $uploaded = move_uploaded_file($tmp_file, $upload_dir.$file_name);
          
            if($uploaded) {
                // Create the full path to the uploaded file
                $profilepic = $upload_dir.$file_name;
            } else {
                echo "Error uploading image. Please try again.";
                exit();
            }
          
        } else {
            // No file was uploaded, so use the current value from the database
            $current_email = $_SESSION['user'];
            $query = "SELECT id FROM user_registrations WHERE email = '$current_email'";
            $result = mysqli_query($conn, $query);
            $user_data = mysqli_fetch_assoc($result);
            $user_id = $user_data['id'];

            $query = "SELECT * FROM user_registrations WHERE id = $user_id";
            $result = mysqli_query($conn, $query);
            $user_data = mysqli_fetch_assoc($result);
            $profilepic = $user_data['profile_picture'];
        }

        // Query to update the user's details
        $email = $_SESSION['user'];
        $query = "SELECT id FROM user_registrations WHERE email = '$email'";
        $result = mysqli_query($conn, $query);
        $user_data = mysqli_fetch_assoc($result);
        $user_id = $user_data['id'];

        $update_query = "UPDATE user_registrations SET";
        $update_query .= " fullname = '$fullname',";
        $update_query .= " email = '$email',";
        $update_query .= " phonenumber = '$phonenumber',";
        $update_query .= " password = '$password',";

        if ($profilepic != '') {
            $update_query .= " profile_picture = '$profilepic',";
        }

        $update_query = rtrim($update_query, ',');
        $update_query .= " WHERE id = $user_id";
        
        mysqli_query($conn, $update_query);

        // Redirect to the profile page after updating
        header("Location: ../Dashboard/account.php");
        exit();

    }
} else {
    echo "<script>
            location.replace('../login.php');
        </script>";
}
?>
