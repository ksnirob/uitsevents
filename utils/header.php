<title>UITS Events</title>

<header>
    <nav class="navbar">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand">
                    <h2>UITS Events</h2>
                </a>
            </div>

            <ul class="nav navbar-nav navbar-right">
                <?php if (!isset($_SESSION['login_user'])) { ?><li><a href="index.php"><strong>Home</strong></a></li><?php } ?>
                <?php if (isset($_SESSION['login_user'])) { ?><li><a href="adminPage.php"><strong>Dashboard</strong></a></li> <?php } ?>
                <?php if (isset($_SESSION['usn'])) { ?><li><a href="RegisteredEvents.php"><strong>Events</strong></a></li> <?php } ?>

                <?php if (!isset($_SESSION['login_user']) and !isset($_SESSION['usn'])) { ?> <li><a href="register.php"><strong>Register</strong></a></li><?php } ?>
                <li><a href="contact.php"><strong>Contact Us</strong></a></li>
                <li><a href="aboutus.php"><strong>About us</strong></a></li>
                <?php if (!isset($_SESSION['login_user']) && !isset($_SESSION['usn'])) { ?> <li class="btnlogout"><a class="btn btn-default navbar-btn" href="login_form.php">Login <span class="glyphicon glyphicon-log-in"></span></a></li> <?php } ?>
                <?php if (isset($_SESSION['login_user']) || isset($_SESSION['usn'])) { ?> <li class="btnlogout"><a class="btn btn-default navbar-btn" href="logout.php">Logout <span class="glyphicon glyphicon-log-in"></span></a></li> <?php } ?>
            </ul>
        </div>
    </nav>
</header>