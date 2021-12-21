<?php
session_start();
include 'classes/db1.php';
$id = $_GET['id'];

$result = mysqli_query($conn,"SELECT * FROM staff_coordinator WHERE stid='$id' ");

$sf = mysqli_fetch_array($result);

if (isset($_POST["update"])) {
    $name = $_POST["name"];
    $phone = $_POST["phone"];

    $sql = "UPDATE staff_coordinator SET phone='$phone', name='$name' WHERE stid=$id";
    
    $result = mysqli_query($conn,$sql);


    if ($result === true) {
        echo "<script>
        alert('Updated Successfully');
        window.location.href='Staff_cordinator.php';
        </script>";
    } else {
        header("location:updateStaff.php?id=$id");
    }
}
?>
<!DOCTYPE HTML>
<html>

<head>
    <title>UITS Event</title>
    <?php require 'utils/styles.php'; ?>

</head>

<body>
    <?php require 'utils/header.php'; ?>
    <div class="content">
        <div class="container">
            <div class="col-md-6 col-md-offset-3">
                <form method="POST">
                    <label>Staff co-ordinator name</label><br>
                    <input type="text" name="name" value="<?= $sf['name']; ?>" required class="form-control"><br><br>
                    <label>Staff co-ordinator phone</label><br>
                    <input type="text" name="phone" value="<?= $sf['phone'] ?>" required class="form-control"><br><br>
                    <button type="submit" name="update" class="btn btn-primary ">Update</button>
            </div>
        </div>
    </div>
    </form>


    <?php require 'utils/footer.php'; ?>
</body>

</html>

