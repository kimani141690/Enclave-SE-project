<?php
session_start();
if(!isset($_SESSION["admin_fname"]))
{
    header("location:../login/login.php");
}

require("../connection/connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="admin_dashboard.css">
  <link rel="stylesheet" href="../side_bar.css">
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

  <title>Admin</title>
</head>
<body>
  <div style=" width: 23%;" class="sidebar"></div>
<?php include("../side_bar.php") ?>

<div class="main-content">
  <header>
    <h2>
      Dashboard
    </h2>

    <div class="search-wrapper">
      <span class="las la-search"></span>
      <input type="search" placeholder="Search Here">
    </div>

    <div class="user-wrapper">
      <img src="../images/user.png" width="45px" height="45px" alt="">
      <div>
        <h4><?php
                     echo "♞ Hi, ";
                     echo $_SESSION["admin_fname"];
                        ?></h4>
         <small> <?php echo"<a href='../login/logging_out.php'>Log Out</a>";
                    ?> </small>
       
      </div>
    </div>
  </header>


  <main>
    <div class="cards">
      <div class="card-single">
        <div>
          <h1>
          <?php 
            $total_students = "SELECT student_number FROM student_details ORDER BY student_number";
            $total_students_run = mysqli_query($conn,$total_students);

            $row = mysqli_num_rows($total_students_run);

            echo"$row";
            ?>
          </h1>
          <span>STUDENTS</span>
        </div>
        <div>
          <span class="las la-users"></span>
        </div>
      </div>
      <div class="card-single">
        <div>
          <h1>
            <?php 
            $total_lecturers = "SELECT lecturer_id FROM LECTURER ORDER BY lecturer_id";
            $total_lecturers_run = mysqli_query($conn,$total_lecturers);

            $row = mysqli_num_rows($total_lecturers_run);

            echo"$row";
            ?>
          </h1>
          <span>LECTURERS</span>
        </div>
        <div>
          <span class="las la-chalkboard-teacher"></span>
        </div>
      </div>
      <div class="card-single">
        <div>
          <h1>
          <?php 
            $total_courses = "SELECT course_id FROM COURSES ORDER BY course_id";
            $total_courses_run = mysqli_query($conn,$total_courses);

            $row = mysqli_num_rows($total_courses_run);

            echo"$row";
            ?>
          </h1>
          <span>COURSES</span>
        </div>
        <div>
          <span class="las la-list-ul"></span>
        </div>
      </div>
      <div class="card-single">
        <div>
          <h1>
          <?php 
            $total_units = "SELECT unit_id FROM UNITS ORDER BY unit_id";
            $total_units_run = mysqli_query($conn,$total_units);

            $row = mysqli_num_rows($total_units_run);

            echo"$row";
            ?>
          </h1>
          <span>UNITS</span>
        </div>
        <div>
          <span class="las la-book"></span>
        </div>
      </div>
    </div>
  </main>
</div>
</body>
</html>