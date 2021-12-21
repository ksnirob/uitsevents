<?php
session_start();
require 'classes/db1.php';
$id = $_GET['id'];

$usn = "";
if(isset($_SESSION['usn'])){    
$usn = $_SESSION['usn'];
}

$result = mysqli_query($conn, "SELECT * FROM events
                                INNER JOIN event_info USING (event_id)
                                INNER JOIN staff_coordinator USING (event_id)
                                INNER JOIN student_coordinator USING (event_id)
                                WHERE type_id = '$id' 
                                AND event_id NOT IN (SELECT event_id FROM registered WHERE usn = '$usn')
                                ");
?>
<!DOCTYPE html>
<html>

<head>
    <title>UITS Events</title>
    <title></title>
    <?php require 'utils/styles.php'; ?>
</head>

<body>
    <?php require 'utils/header.php'; ?>
    <div class="content">
        <div class="container">
            <div class="col-md-12">
            </div>
            <?php
            if (mysqli_num_rows($result) > 0) {
                $i = 0;
                while ($row = mysqli_fetch_array($result)) {
                    include 'events.php';
                    $i++;
                }
            ?>
                <div class="container">
                    <div class="col-md-12">
                        <hr>
                    </div>
                </div>
            <?php } ?>
            <a class="btn btn-primary" href="index.php"><span class="glyphicon glyphicon-circle-arrow-left"></span> Back</a>
        </div>
        <?php require 'utils/footer.php'; ?>
</body>

</html>