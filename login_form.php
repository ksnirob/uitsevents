<?php
session_start();
if (isset($_SESSION['login_user'])) {
    header("location: adminPage.php");
}

include_once 'classes/db1.php'; ?>
<!DOCTYPE HTML>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>UITS Event</title>
    <title></title>
    <style>
        span.error {
            color: red;
        }
    </style>
    <?php require 'utils/styles.php'; ?>
</head>

<body>
    <?php require 'utils/header.php'; ?>
    <div class="content">
        <div class="container">
            <div class="col-md-6 col-md-offset-3">

                <form method="POST">


                    <label>UserName:</label><br>
                    <input type="text" name="name" value="admin" class="form-control" required><br>


                    <label>Password</label><br>
                    <input type="password" name="password" value="admin" class="form-control" required><br>
                    <button type="submit" name="update" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>
    <?php require 'utils/footer.php'; ?>
</body>

</html>
<?php
session_start();
if (isset($_POST["update"])) {
    $myusername = $_POST['name'];
    $mypassword = $_POST['password'];

    if ($mypassword == 'admin' && $myusername == 'admin') {
        $_SESSION['login_user'] = $myusername;
        echo "<script>
    alert('Login Successfull');
    window.location.href='adminPage.php';
    </script>";
    } else {
        echo "<script>
    alert('Invalid credentials');
    window.location.href='login_form.php';
    </script>";
    }
}
?>