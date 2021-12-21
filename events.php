<div class="container">
    <div class="col-md-12">
        <hr>
    </div>

    <div class="row">
        <section>
            <div class="container">
                <div class="col-md-6">
                    <img src=" <?php echo $row['img_link']; ?>" class="img-responsive">
                </div>
                <div class="subcontent col-md-6">
                    <h1 style="color:#003300 ; font-size:38px ;"><u><strong><?php echo '<td>' . $row['event_title'] . '</td>'; ?></strong></u></h1>
                    <p style="color:#003300  ;font-size:20px ">
                        <?php
                        echo 'Date:' . $row['date'] . '<br>';
                        echo 'Time:' . $row['time'] . '<br>';
                        echo 'Location:' . $row['location'] . '<br>';
                        echo 'Student Co-ordinator:' . $row['st_name'] . '<br>';
                        echo 'Staff Co-ordinator:' . $row['name'] . '<br>';
                        echo 'Event Price:' . $row['event_price'] . '<br>';

                        ?>
                    </p>

                    <br><br>
                    <?php if (!isset($_SESSION['usn'])) { ?>
                        <a class="btn btn-primary" href="register.php"> <span class="glyphicon glyphicon-circle-arrow-right"></span>Register</a>
                    <?php } ?>

                    <?php if (isset($_SESSION['usn'])) { ?>
                        <a class="btn btn-primary" href="join.php?id=<?= $row['event_id']; ?>"> <span class="glyphicon glyphicon-circle-arrow-right"></span>Join</a>
                    <?php } ?>
                </div>
            </div>
        </section>
    </div>
</div>