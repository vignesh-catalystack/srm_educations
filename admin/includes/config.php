<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "srm_educations"; // Change this to your actual DB name

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>