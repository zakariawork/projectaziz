<?php
include("cnx/cnx.php"); 
session_start();

$email = $_POST["email"];
$password = $_POST["password"];

// Establish a database connection
$conn = new mysqli("localhost", "root", "", "online_rest");

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the provided email$email and password match a user in the database
$sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // The provided email$email and password match a user in the database
    $_SESSION["logged_in"] = true;
    $_SESSION["email"] = $email;
    header("Location: home.php");
    exit;
} else {
    // The provided email$email and password do not match a user in the database
    $_SESSION["logged_in"] = false;
    header("Location: login.php?error=invalid_credentials");
    exit;
}

mysqli_close($conn);

?>