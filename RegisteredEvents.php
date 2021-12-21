<?php
session_start();

if (!isset($_SESSION['usn'])) {
    header("Location: usn.php");
}

require_once 'utils/header.php';
require_once 'utils/styles.php';

$usn = "";
if(isset($_SESSION['usn'])){   
$usn = $_SESSION['usn'];
}

include_once 'classes/db1.php';

$registeredEvents = mysqli_query($conn, "SELECT * FROM registered
                                INNER JOIN events USING (event_id)
                                INNER JOIN event_info USING (event_id)
                                INNER JOIN staff_coordinator USING (event_id)
                                INNER JOIN student_coordinator USING (event_id)
                                WHERE registered.usn = '$usn'");
?>

<div class="content">
    <div class="container">
        <h1> Registered Events</h1>
        <?php
        if (mysqli_num_rows($registeredEvents) > 0) {
        ?>
            <table class="table table-hover">
                <thead>
                    <tr>

                        <th>Event_name</th>
                        <th>Student Co-ordinator</th>
                        <th>Staff Co-ordinator</th>

                        <th>Date</th>

                        <th>Time</th>
                        <th>location </th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                    while ($row = mysqli_fetch_array($registeredEvents)) {

                        echo '<tr>';
                        echo '<td>' . $row['event_title'] . '</td>';
                        echo '<td>' . $row['st_name'] . '</td>';
                        echo '<td>' . $row['name'] . '</td>';
                        echo '<td>' . $row['date'] . '</td>';
                        echo '<td>' . $row['time'] . '</td>';
                        echo '<td>' . $row['location'] . '</td>';
                        echo '</tr>';

                        $i++;
                    }

                    ?>
                </tbody>
            </table>
        <?php } else {
            echo 'Not Yet Rgistered any events';
        } ?>
    </div>
</div>

<?php
$registeredEvents = mysqli_query($conn, "SELECT * FROM registered
                                INNER JOIN events USING (event_id)
                                INNER JOIN event_info USING (event_id)
                                INNER JOIN staff_coordinator USING (event_id)
                                INNER JOIN student_coordinator USING (event_id)
                                WHERE registered.usn = '$usn'");

$event_id = "";
while ($row = mysqli_fetch_array($registeredEvents)) {
    $event_id .= $row["event_id"] . ",";
}
$event_ids = substr($event_id, 0, -1) ? substr($event_id, 0, -1) : 0;

/* Not registered events */
$events = mysqli_query($conn, "SELECT * FROM events
INNER JOIN event_info USING (event_id)
INNER JOIN staff_coordinator USING (event_id)
INNER JOIN student_coordinator USING (event_id)
WHERE event_id NOT IN($event_ids)
");


?>
<div class="content">
    <div class="container">
        <h1>Not Registered Events</h1>
        <?php
        if (mysqli_num_rows($events) > 0) {
        ?>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#SL</th>
                        <th>Event_name</th>
                        <th>Student Co-ordinator</th>
                        <th>Staff Co-ordinator</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>location </th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                    while ($row = mysqli_fetch_array($events)) {
                        echo '<tr>';
                        echo '<td>' . $i + 1 . '</td>';
                        echo '<td>' . $row['event_title'] . '</td>';
                        echo '<td>' . $row['st_name'] . '</td>';
                        echo '<td>' . $row['name'] . '</td>';
                        echo '<td>' . $row['date'] . '</td>';
                        echo '<td>' . $row['time'] . '</td>';
                        echo '<td>' . $row['location'] . '</td>';
                        echo '<td>' . $row['location'] . '</td>';
                        echo '<td> <a class="btn btn-success btn-sm" href="join.php?id=' . $row['event_id'] . '">Join</a></td>';
                        echo '</tr>';
                        $i++;
                    }
                    ?>
                </tbody>
            </table>
        <?php
        } else {
            echo 'NOT able fetch';
        }
        ?>
    </div>
</div>
<?php include 'utils/footer.php'; ?>