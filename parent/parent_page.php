<?php
require '..\connection.php';
session_start();

$student_num = $_SESSION['student_number'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Enclave School Academic progress Parents Details</title>
  <link rel="stylesheet" href="parentspage.css">
</head>

<body>
  <div class="navbar">
    <div class="navLeft"><span>ENCLAVE SCHOOL</span></div>
    <div class="navRight">
      <img src="images/user-svgrepo-com.svg" alt="user Icon" width="20px" height="20px" />
      <img src="images/power-off.png" alt="logout" width="20px" height="20px" />
    </div>



  </div>

 

  <div class="ARight">
    <table>
      <tr>
        <th class="header" colspan="2">
          <h2>STUDENT DETAILS</h2>

          <?php

          $sql = "select * from student_details where student_number =$student_num";
          $result = mysqli_query($conn, $sql);

          while ($row = mysqli_fetch_assoc($result)) {

          ?>


        </th>
      </tr>

      <tr>
        <td>Name</td>
        <td><?php echo $row['student_fname'] ?></td>
      </tr>
      <tr>
        <td>Name</td>
        <td><?php echo $row['student_sname'] ?></td>
      </tr>

      <tr>
        <td>School ID</td>
        <td> <?php echo $student_num; ?></td>
      </tr>

      <tr>
        <td>School Email</td>
        <td><?php echo $row['school_email'] ?></td>
      </tr>

      <tr>
        <td>Intake</td>
        <td><?php echo $row['intake'] ?></td>
      </tr>

    </table>

  <?php
          }


  ?>
  </div>
  </div>

  <div class="Bheader">
    <h1>ACADEMIC PROGRESS</h1>
  </div>

  <div class="classC">
    <div class="classDLeft">
      <table>
        <tr>
          <th class="header" colspan="3">
            <h2>ATTENDANCE REPORT</h2>
          </th>
        </tr>
        <?php


        $units = "SELECT * FROM ENROLLMENT INNER JOIN LEC_CLASS ON ENROLLMENT.unit_id=LEC_CLASS.unit_id WHERE ENROLLMENT.student_number=$student_num AND ENROLLMENT.class=LEC_CLASS.class";
        $unit_result = mysqli_query($conn, $units);
        while ($unit_row = mysqli_fetch_assoc($unit_result)) {

          $unit_id = $unit_row['unit_id'];
          $unit_name = $unit_row['class_name'];
          $class_group = $unit_row['class'];
        ?>

          <tr>
            <td> <?php echo $unit_name; ?></td>
            <td> <?php echo $class_group; ?></td>

            <?php
            $query = "SELECT * from ATTENDANCE INNER JOIN LEC_CLASS on ATTENDANCE.unit_id = LEC_CLASS.unit_id where ATTENDANCE.student_number=$student_num AND ATTENDANCE.unit_id='$unit_id'";
            $query_result = mysqli_query($conn, $query);
            $num = mysqli_num_rows($query_result);

            $query1 = "SELECT * FROM ATTENDANCE where attendance_status ='present' and unit_id='$unit_id' and student_number=$student_num";
            $query_result1 = mysqli_query($conn, $query1);
            $num2 = mysqli_num_rows($query_result1);

            while ($row = mysqli_fetch_assoc($query_result)) {

              $attendance = ($num2 / $num) * 100;

            ?>

              <td> <?php echo $attendance; ?>%</td>

            <?php
            }
            ?>
          </tr>
        <?php
        }


        ?>



      </table>
    </div>


    <div class="classDRight">
      <table>
        <tr>
          <th class="header" colspan="3">
            <h2>UNIT MARKS</h2>
          </th>
        </tr>


        <?php

        $fetch_unit = "SELECT * from LEC_CLASS INNER JOIN ENROLLMENT ON ENROLLMENT.class=LEC_CLASS.class WHERE ENROLLMENT.student_number=$student_num AND ENROLLMENT.unit_id=LEC_CLASS.unit_id";

        $result_fetch_unit = mysqli_query($conn, $fetch_unit);
        while ($fetch_unit_row = mysqli_fetch_assoc($result_fetch_unit)) {
          $unit_id = $fetch_unit_row['unit_id'];
          $unit_name = $fetch_unit_row['class_name'];
        ?>
          <tr>
            <th colspan="2"> <?php echo $unit_name; ?></th>
          </tr>

          <?php

          $sql1 = "SELECT EXAM.exam_id,EXAM.exam_type from EXAM inner Join LEC_CLASS on LEC_CLASS.unit_id =EXAM.unit_id WHERE EXAM.unit_id='$unit_id' AND EXAM.class=LEC_CLASS.class";
          $result1 = mysqli_query($conn, $sql1);
          while ($row1 = mysqli_fetch_assoc($result1)) {
            $exam_id = $row1['exam_id'];
            $exam_type = $row1['exam_type'];

            // foreach($exam_id as $exam){

            $sql2 = "SELECT student_marks FROM STUDENT_RESULTS WHERE exam_id =$exam_id and student_number= $student_num";
            $result2 = mysqli_query($conn, $sql2);

            while ($row2 = mysqli_fetch_assoc($result2)) {
              $exam_mark = $row2['student_marks'];
          ?>
              <tr>
                <td> <?php echo $exam_type; ?></td>
                <td> <?php echo $exam_mark; ?></td>
              </tr>


          <?php
            }
          }
          ?>

          <tr style="background-color:burlywood;">
          <td style="text-align:right;"><strong>Final Mark</strong></td>
          <td></td><!-- This is where the final mark is displayed-->
        </tr>
        <tr>
          <td style="text-align:right;"><strong>Final Grade</strong></td>
          <td></td><!-- This is where the final grade is displayed-->
          </tr>

          <tr>
            <td colspan="2"> </td>
          </tr>
        <?php
        }

        $conn->close();

        ?>




      </table>
    </div>

  </div>
</body>

</html>