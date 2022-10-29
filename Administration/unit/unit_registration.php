<?php

require("../connection/connection.php");

$sql = "SELECT * FROM LECTURER";
$all_lecturer = mysqli_query($conn, $sql);

$sql2 = "SELECT * FROM COURSES";
$all_courses = mysqli_query($conn, $sql2);

?>
<!DOCTYPE HTML>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
  <link rel="stylesheet" href="../side_bar.css">
  <link rel="stylesheet" href="unit_registration.css">


  <title>Unit Registration</title>
</head>

<body>
  <?php include("../side_bar.php") ?>
  <div class="main-content">

    <header>
      <h2>UNIT REGISTRATION</h2>
    </header>


    <div class="form-box">
      <form action="process_unit_registration.php" method="POST">
        <label for="unit_name">Name of the Unit</label>
        <input type="text" id="unit_name" name="unit_name" placeholder="Unit name...">

        <label for="unit_capacity">Unit Capacity</label>
        <input type="number" id="unit_capacity" name="unit_capacity" placeholder="Unit Capacity..">


        <label for="course_id">Course Name</label>
        <select id="course_id" name="course_id">

          <?php
          while ($course = mysqli_fetch_assoc($all_courses)) :;
          ?>
            <option value="<?php echo $course["course_id"];
                            ?>">
              <?php echo $course["course_name"];
              ?>
            </option>
          <?php
          endwhile;
          ?>

        </select>


        <label for="lecturer_id">Lecturer Assignment</label>

        <select id="lecturer_id" name="lecturer_id">
          <?php
          while ($lecturer = mysqli_fetch_assoc($all_lecturer)) :;
          ?>
            <option value="<?php echo $lecturer["lecturer_id"];
                            ?>">
              <?php echo $lecturer["lec_last_name"];
              ?>
            </option>
          <?php
          endwhile;
          ?>

        </select>


        <input type="submit" value="Submit">
      </form>
    </div>

  </div>
</body>

</html>