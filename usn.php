<?php session_start();

require_once 'classes/db1.php';

if (isset($_SESSION['usn'])) {
    header("Location: RegisteredEvents.php");
}


if(isset($_POST['usn'])){
    $usn = $_POST['usn'];
}

if(isset($_POST['password'])){
    $password = base64_encode($_POST['password']);
}

// check $usn is already registered or not
if (isset($usn) && isset($password)) {

    $result = mysqli_query($conn, "SELECT * FROM participent WHERE usn = '$usn' and password='$password'");

    if (mysqli_num_rows($result) === 1) {
        $_SESSION['usn'] = $usn;
        header("Location: RegisteredEvents.php");
    } else {
        echo "<script>
        alert('Invalid credentials!');
        window.location.href='usn.php';
        </script>";
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
                <form action="usn.php" class="form-group" method="POST">


                    <div class="form-group">
                        <label for="stuid"> Student ID: </label>
                        <input type="text" id="stuid" name="usn" class="form-control">                        
                        <label for="stuid"> Password : </label>
                        <input type="password" name="password" required class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>
    <?php require 'utils/footer.php'; ?>
</body>

</html>