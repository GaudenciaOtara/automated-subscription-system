<?php
$servername = "localhost";
$dbusername = "root";
$dbpassword = "1234";
$databasename = "sub_system";

$conn = mysqli_connect($servername, $dbusername, $dbpassword, $databasename);

if (!$conn) {

    die();

}

?>