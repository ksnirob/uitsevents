<?php include 'classes/db1.php';
    $id=$_GET['id'];
?>
<!DOCTYPE HTML>
<html>
<head>
        <title>UITS Event</title>
        <title></title>
        <?php require 'utils/styles.php'; ?>
        
    </head>
    <body>
    <?php require 'utils/header.php'; ?>
    <div class ="content">
            <div class = "container">
                <div class ="col-md-6 col-md-offset-3">
    <form method="POST">
<label>Staff co-ordinator name</label><br>
    <input type="text" name="st_name" required class="form-control"><br><br>
    <label>Staff co-ordinator phone</label><br>
    <input type="text" name="phone" required class="form-control"><br><br>
    <button type="submit" name="update" class = "btn btn-default ">Update</button>
    </div>
    </div>
    </div>
    </form>
    

    <?php require 'utils/footer.php'; ?>
    </body>
</html>


<?php

 if (isset($_POST["update"]))
 {
     $name=$_POST["st_name"];
     $phone=$_POST["phone"];
     $sql="UPDATE staff_coordinator set phone='$phone',name='$name' where stid='$id'";
     if($conn->query($sql)===true)
     {
        echo"<script>
        alert(' Updated Successfully');
        window.location.href='stu_cordinator.php';
        </script>";
     }
     else
     {
        echo"<script>
        window.location.href='updateStudent.php';
        </script>";
     }
}
?>