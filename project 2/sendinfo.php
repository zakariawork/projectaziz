<?php
include("cnx/cnx.php"); 

$u_id = $_POST["id"];
$username = $_POST["username"];
$password = $_POST["password"];
$email = $_POST["email"];
$phone = $_POST["phone"];

// Establish a database connection
$conn = new mysqli("localhost", "root", "", "online_rest");

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert the new user into the database
$sql = "INSERT INTO users (username, password, email) VALUES ('$u_id' , '$username', '$password'  , '$email' , '$f_name' , '$l_name' , '$phone' , '$address')";

if ($conn->query($sql) === TRUE) {
    echo "New user created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>