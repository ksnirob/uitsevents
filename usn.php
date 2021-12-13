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

        <div class ="content">
            <div class = "container">
                <div class ="col-md-6 col-md-offset-3">
                    <form action="RegisteredEvents.php" class ="form-group" method="POST">

                        
                        <div class="form-group">
                            <label for="stuid"> Student ID: </label>
                            <input type="text"
                                   id="stuid"
                                   name="stuid"
                                   class="form-control">
                        </div>
                        <button type="submit" class = "btn btn-default">Login</button>
                    </form>
                </div>
            </div>
        </div>
        <?php require 'utils/footer.php'; ?>
    </body>
</html>
