<?php
$servername = "localhost";
$username = "admin";
$password = "admin";
$dbname = "campus_events";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

if(!$conn){
    echo "Connection error " . $mysqli_connect_error();
}
