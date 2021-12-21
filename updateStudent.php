<?php
session_start();
include 'classes/db1.php';
$id = $_GET['id'];

$result = mysqli_query($conn,"SELECT * FROM student_coordinator WHERE sid='$id' ");

$st = mysqli_fetch_array($result);


if (isset($_POST["update"])) {
    $name = $_POST["st_name"];
    $phone = $_POST["phone"];
    

    $sql = "UPDATE student_coordinator SET phone='$phone',st_name='$name' WHERE sid='$id' ";
    if ($conn->query($sql) === true) {
        echo "<script>
        alert(' Updated Successfully');
        window.location.href='Stu_cordinator.php';
        </script>";
    } else {
        header("location:updateStudent.php?id=$id");
    }
}

?>
<!DOCTYPE HTML>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>UITS Event</title>
    <title></title>
    <?php require 'utils/styles.php'; ?>

</head>

<body>
    <?php require 'utils/header.php'; ?>
    <div class="content">
        <div class="container">
            <div class="col-md-6 col-md-offset-3">
                <form method="POST">
                    <label>Student co-ordinator name</label><br>
                    <input type="text" name="st_name" value="<?= $st['st_name'];?>" required class="form-control"><br><br>
                    <label>Student co-ordinator phone</label><br>
                    <input type="text" name="phone" value="<?= $st['phone']; ?>" required class="form-control"><br><br>
                    <button type="submit" name="update" class="btn btn-primary ">Update</button>
            </div>
        </div>
    </div>
    </form>


    <?php require 'utils/footer.php'; ?>
</body>

</html>
