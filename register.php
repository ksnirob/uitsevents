<?php
session_start();
require_once 'classes/db1.php';

if (isset($_SESSION['login_user'])) {
    header("location: adminPage.php");
}

if(isset($_GET['usn'])){
    $usn = $_GET['usn'];
}

if(isset($_GET['name'])){
    $name = $_GET['name'];
}

if(isset($_GET['email'])){
    $email = $_GET['email'];
}

if(isset($_GET['phone'])){
    $phone = $_GET['phone'];
}

if(isset($_GET['batch'])){
    $batch = $_GET['batch'];
}

if(isset($_GET['sem'])){
    $sem = $_GET['sem'];
}

if(isset($_GET['dept'])){
    $dept = $_GET['dept'];
}


if (isset($_POST["update"])) {

    $usn = $_POST["usn"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = base64_encode($_POST["password"]);
    $batch = $_POST["batch"];
    $sem = $_POST["sem"];
    $dept = $_POST["dept"];

    $hasUsn = mysqli_query($conn, "SELECT 'usn' FROM participent WHERE usn='$usn'");
    $hasEmail = mysqli_query($conn, "SELECT 'email' FROM participent WHERE email='$email'");

    if (mysqli_num_rows($hasUsn) > 0) {
        header("location:register.php?usn_error=Already registered this student!&email=$email&name=$name&phone=$phone&batch=$batch&dept=$dept&usn=$usn&sem=$sem");
    } elseif (mysqli_num_rows($hasEmail) > 0) {
        header("location:register.php?email_error=Already registered has the Email!&email=$email&name=$name&phone=$phone&batch=$batch&sem=$sem&dept=$dept&usn=$usn");
    } elseif (!empty($usn) || !empty($name) || !empty($password) || !empty($batch) || !empty($sem) || !empty($email) || !empty($phone) || !empty($dept)) {

        $INSERT = "INSERT INTO participent (usn, name, batch,sem,email,phone,dept,password) VALUES ('$usn','$name','$batch','$sem','$email','$phone','$dept','$password');";

        // Insert the record into the database
        $result = mysqli_query($conn, $INSERT);

        if ($result) {
            echo "<script>
                    alert('Registered Successfully!');
                    window.location.href='usn.php';
                    </script>";
        } else {
            echo "<script>
                    alert('Something Went wrong! Please Try again!');
                    window.location.href='usn.php';
                    </script>";
        }
    } else {
        echo "<script>
            alert('All fields are required');
            window.location.href='register.php';
            </script>";
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
                <form method="POST" action="register.php">

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Student ID:</label>
                            <input type="text" name="usn" pattern="[A-Za-z0-9]{10}" value="<?php if(isset($usn)){echo $usn;} ?>" class="form-control" required>
                            <span class="text-danger font-italic"><?php if (isset($_GET['usn_error'])) {
                                                                        echo $_GET['usn_error'];
                                                                    } ?></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Student Name:</label>
                            <input type="text" name="name" class="form-control" 
                                value="<?php if(isset($name)){echo $name;} ?>"
                             required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Email:</label>
                            <input type="email" name="email" class="form-control" value="<?php if(isset($email)){echo $email;} ?>"required>
                            <span class="text-danger font-italic"><?php if (isset($_GET['email_error'])) {
                                                                        echo $_GET['email_error'];
                                                                    } ?></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Phone Number:</label>
                            <input type="number" name="phone" class="form-control" 
                            value="<?php if(isset($phone)){echo $phone;} ?>"
                             required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Password:</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Batch:</label>
                            <input type="text" name="batch" class="form-control" 
                            value="<?php if(isset($phone)){echo $phone;} ?>"
                             required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Department:</label><br>
                            <select id="dept" name="dept" class="form-control" style="padding:8px;" value="<?php if(isset($dept)){echo $dept;} ?>" >
                                <option value=""> -- Select Department -- </option>
                                <option value="cse">CSE</option>
                                <option value="it">IT</option>
                                <option value="eee">EEE</option>
                                <option value="ece">ECE</option>
                                <option value="english">English</option>
                                <option value="socialwork">Social Work</option>
                                <option value="pharmacy">Pharmacy</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Semester:</label>
                            <input type="text" name="sem" class="form-control" required value="<?php if(isset($sem)){echo $sem;} ?>"
                            ><br>
                        </div>
                    </div><br>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <button type="submit" name="update" class="btn btn-primary" required>Submit</button>
                            <a href="usn.php" style="text-decoration: none; font-size:16px; margin-left: 10px;">Already registered ?</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    </form>


    <?php require 'utils/footer.php'; ?>
</body>

</html>