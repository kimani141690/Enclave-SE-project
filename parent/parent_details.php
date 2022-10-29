<?php
require '..\connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="parent_details.css">
    <link rel="stylesheet" href="../side_bar.css">

    <title>Enclave School Parent Details</title>


</head>

<body>
    <?php include("../side_bar.php") ?>
    <div class="main-content">

        <header>

            <h2>PARENT DETAILS</h2>
        </header>
        <table>
            <tr>
                <th class="header" colspan="6">
                </th>
            </tr>

            <tr>
                <th>Student ID</th>
                <th>Student First Name</th>
                <th>Student Second Name</th>
                <th>Parent Name</th>
                <th>Phone Number</th>
                <th>Home Address</th>

            </tr>
            <tbody>

                <?php
                $query = "SELECT * FROM student_details";

                $query_run = mysqli_query($conn, $query);

                if (mysqli_num_rows($query_run) > 0) {
                    foreach ($query_run as $student) {
                ?>
                        <tr>
                            <td><?= $student['student_number']; ?></td>
                            <td><?= $student['student_fname']; ?></td>
                            <td><?= $student['student_sname']; ?></td>
                            <td><?= $student['parent_sname']; ?></td>
                            <td><?= $student['parent_phone_number']; ?></td>
                            <td><?= $student['home_location']; ?></td>


                        </tr>
                <?php
                    }
                } else {
                    echo "<h5> No Record Found </h5>";
                }
                ?>

            </tbody>
        </table>
    </div>
</body>

</html>