<?php
require("../connection/connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="lecturer_details.css">
    <link rel="stylesheet" href="../side_bar.css">
    <title>Enclave School Lecturer Details</title>


    </style>

</head>

<body>
    <?php include("../side_bar.php") ?>
    <div class="main-content">
        <header>
            <h2>LECTURER DETAILS</h2>
        </header>

        <table>
            <tr>
                <th class="header" colspan="8">
                </th>
            </tr>

            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Tel No</th>
                <th>Email</th>
                <th>Address</th>
                <th>Description</th>
                <th>Faculty</th>

            </tr>
            <tbody>

                <?php
                $query = "SELECT * FROM LECTURER
                INNER JOIN Faculty ON LECTURER.Faculty_id = Faculty.faculty_id WHERE LECTURER.Faculty_id = Faculty.faculty_id";

                $query_run = mysqli_query($conn, $query);

                if (mysqli_num_rows($query_run) > 0) {
                    foreach ($query_run as $student) {
                ?>
                        <tr>
                            <td><?= $student['lecturer_id']; ?></td>
                            <td><?= $student['lec_first_name']; ?></td>
                            <td><?= $student['lec_last_name']; ?></td>
                            <td><?= $student['lec_phone_number']; ?></td>
                            <td><?= $student['lec_school_email']; ?></td>
                            <td><?= $student['lec_physical_address']; ?></td>
                            <td><?= $student['lec_description']; ?></td>
                            <td><?= $student['faculty_name']; ?></td>


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