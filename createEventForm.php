<?php session_start();
include_once 'classes/db1.php';

// find all events
$result = mysqli_query($conn, "SELECT * FROM events");
$eventTypes = mysqli_query($conn, "SELECT * FROM event_type");

$id = null;
while ($row = mysqli_fetch_array($result)) {
  $id = $row['event_id'] > $id ? $row['event_id'] : $id;
}

$id = $id + 1;

if (isset($_REQUEST["submit"])) {
  /* events table */
  $event_id = $id;
  $event_title = $_POST["event_title"];
  $event_price = $_POST["event_price"];
  $type_id = $_POST["type_id"];

  $photo_name = $_FILES["photo"]['name'];
  $img_link = "images/" . $photo_name;

  $photo_info = $_FILES["photo"]['name'];
  $photo_tmp = $_FILES["photo"]['tmp_name'];
  $path_of_moving_file = "images/";

  if (!empty($event_id) && !empty($event_title) && !empty($event_price) && !empty($type_id) && !empty($img_link)) {
    $EVENT = "INSERT INTO events(event_id,event_title,event_price,img_link,type_id) VALUES ($event_id,'$event_title', $event_price,'$img_link',$type_id)";
    if (mysqli_query($conn, $EVENT)) {
      move_uploaded_file($photo_tmp, $path_of_moving_file . $photo_name);
    }
  }

  /* event_info table */
  $date = $_POST["date"];
  $time = $_POST["time"];
  $location = $_POST["location"];

  if (!empty($date) && !empty($time) && !empty($location)) {
    $EVENT_INFO = "INSERT INTO event_info (event_id,date,time,location) VALUES ($event_id,'$date','$time','$location')";
    mysqli_query($conn, $EVENT_INFO);
  }

  $name = $_POST["sname"];
  $st_name = $_POST["st_name"];

  if (!empty($name) && !empty($st_name)) {
    $INSERT = "INSERT INTO student_coordinator(st_name,phone,event_id) values('$st_name', NULL, $event_id);";
    $INSERT .= "INSERT INTO staff_coordinator(name,phone,event_id) values('$name',NULL,$event_id)";
    if ($conn->multi_query($INSERT) === True) {
      echo "<script>
      alert('Event Inserted Successfully!');
      window.location.href = 'adminPage.php';
     </script>";
    } else {
      echo "<script>
      alert('Event already exsists!');
      window.location.href = 'createEventForm.php';
      </script>";
    }

    $conn->close();
  } else {
    echo "<script>
      alert('All fields are required');
      window.location.href = 'createEventForm1.php';
      </script>";
  }
}
?>

<!DOCTYPE HTML>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>UITS Event</title>
  <?php require 'utils/styles.php'; ?>

</head>

<body>
  <?php require 'utils/adminHeader.php'; ?>
  <form method="POST" enctype="multipart/form-data">

    <div class="w3-container">

      <div class="content">
        <div class="container">
          <div class="col-md-6 col-md-offset-3">
            <label>Event ID:</label><br>
            <input type="number" name="event_id" disabled value="<?= $id; ?>" required class="form-control"><br><br>

            <label>Event Name:</label><br>
            <input type="text" name="event_title" required class="form-control"><br><br>

            <label>Event Price:</label><br>
            <input type="number" name="event_price" required class="form-control"><br><br>

            <label>Upload Image:</label><br>
            <input type="file" name="photo" required class="form-control"><br><br>

            <label>Event Type </label><br>
            <select type="number" name="type_id" required class="form-control">
              <option value="1"> --Select Event Type -- </option>
              <?php while ($row = mysqli_fetch_array($eventTypes)) { ?>
                <option value="<?= $row['type_id'] ?>"><?= $row['type_title'] ?></option>
              <?php } ?>
            </select>
            <br><br>

            <label>Event date</label><br>
            <input type="date" name="date" required class="form-control"><br><br>

            <label>Event Time</label><br>
            <input type="time" name="time" required class="form-control"><br><br>

            <label>Event Location</label><br>
            <input type="text" name="location" required class="form-control"><br><br>
            <label>Staff co-ordinator name</label><br>
            <input type="text" name="sname" required class="form-control"><br><br>
            <label>Student co-ordinator name</label><br>
            <input type="text" name="st_name" required class="form-control"><br><br>

            <button type="submit" name="submit" class="btn btn-success pull-right">Create Event <span class="glyphicon glyphicon-send"></span></button>

            <a class="btn btn-primary navbar-btn" href="adminPage.php"><span class="glyphicon glyphicon-circle-arrow-left"></span> Back</a>

          </div>
        </div>
      </div>
  </form>
</body>

<?php require 'utils/footer.php'; ?>

</html>