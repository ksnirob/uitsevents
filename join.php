<?php
session_start();
if (!isset($_SESSION['usn'])) {
 header("Location: RegisteredEvents.php");
}

$id = $_GET['id'];
$usn = $_SESSION['usn'];

include_once 'classes/db1.php';

$sql = "INSERT INTO registered (usn, event_id)
       VALUES ('$usn', '$id')";

$result = mysqli_query($conn, $sql);

if ($result) {
 echo "<script>alert('Thanks for joining!')</script>";
 header("Location: RegisteredEvents.php");
} else {
 echo "<script>alert('Already Registered')</script>";
 header("Location: RegisteredEvents.php");
}
