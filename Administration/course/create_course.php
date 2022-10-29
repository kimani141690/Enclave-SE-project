<?php

require("../connection/connection.php");

$sql = "SELECT * FROM Faculty";
$all_faculty = mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
  <head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="create_course.css">
  </head>
<body>

  <header>
    <h2>COURSE CREATION</h2>  
  </header>


<div>
  <form action="process_create_course.php" method="POST">
    <label for="course_name">Name of the Course</label>
    <input type="text" id="course_name" name="course_name" placeholder="Course name...">

    <label for="course_capacity">Capacity</label>
    <input type="number" id="faculty_name" name="course_capacity" placeholder="Course Capacity..">

    <label for="faculty_id">Faculty Name</label>
    <select id="faculty_id" name="faculty_id">
        <?php
        while($faculty = mysqli_fetch_assoc($all_faculty)):;
    ?>
    <option value="<?php echo $faculty["faculty_id"];
    ?>">
    <?php echo $faculty["faculty_name"];
    ?>
     </option>
    <?php
        endwhile;
    ?>
       
    </select>

    
  
    <input type="submit" value="Submit">

  </form>
  </div>
    
</body>
</html>