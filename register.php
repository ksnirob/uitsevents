<!DOCTYPE HTML>
<html>
    <head>
        <title>UITS Event</title>
        <?php require 'utils/styles.php'; ?>
        
    </head>
    <body>
    <?php require 'utils/header.php'; ?>
    <div class ="content">
            <div class = "container">
                <div class ="col-md-6 col-md-offset-3">
    <form method="POST">

    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Student ID:</label>
            <input type="text" name="stuid" class="form-control" required>
        </div>
        <div class="form-group col-md-6">
            <label>Student Name:</label>
            <input type="text" name="name" class="form-control" required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Email:</label>
            <input type="text" name="email"  class="form-control" required>
        </div>
        <div class="form-group col-md-6">
            <label>Phone Number:</label>
            <input type="text" name="phone"  class="form-control" required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Password:</label>
            <input type="password" name="name" class="form-control" required>
        </div>
        <div class="form-group col-md-6">
            <label>Batch:</label>
            <input type="text" name="branch" class="form-control" required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Department:</label><br>
        <select id="dept" name="dept" style="padding:8px;">
            <option value="">-- Select Department --</option>
            <option value="cse">CSE</option>
            <option value="it">IT</option>
            <option value="eee">EEE</option>
            <option value="ece">ECE</option>
            <option value="english">English</option>
            <option value="socialwork">Social Work</option>
            <option value="pharmacy">Pharmacy</option>
        </select>
        <!-- <input type="text" name="dept"  class="form-control" required><br> -->
        </div>
        <div class="form-group col-md-6">
            <label>Semester:</label>
            <input type="text" name="sem" class="form-control" required><br>
        </div>
    </div><br>
    <div class="form-row">
        <div class="form-group col-md-6">
            <button type="submit" name="update" class="btn btn-primary" required>Submit</button>
            <a href="login_form.php" style="text-decoration: none; font-size:16px; margin-left: 10px;">Already registered ?</a>
        </div>
    </div>

    </div>
    </div>
    </div>
    </form>
    

    <?php require 'utils/footer.php'; ?>
    </body>
</html>
