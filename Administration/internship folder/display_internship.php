<?php
require("..\connection.php");
$sql = "select * from internship_information";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {

    $company_name = $row['company_name'];
    $location = $row['location'];
    $slots = $row['slots'];
    $deadline = $row['deadline'];
    $duration = $row['duration'];
    $qualification = $row['qualification'];
    $description = $row['description'];
    $image = $row['company_logo'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Internship</title>

    <style>
        body{

            background-color: #ca9e93;
        }

        .internshipbox{

margin-left: 50px;
padding:10px  10px;
border-bottom:solid black;
height:250px;


        }
        h3{
   margin: bottom 1px;
justify-content: space-between;
        }
    </style>
</head>

<body>

    <div class="main">

        <h2>Internships</h2>
<?php
        foreach ($result as $result){

            echo "
        <div class='internshipbox'>
            <div class='sec1'>
            <img src='$image' alt='' height='100px' width='100px'>
        <h3> Company:$company_name</h3>
               <h3> Location: $location </h3>
               <h3> Application Deadline: $deadline</h3>
               <h3> Durattion: $duration</h3>
               <h3> Slots: $slots</h3>

            </div>
            <div class='sec2'>
            <h4> Job Description</h3>

                 <p> $description </p>  
                 <h4> Qualifications</h3>
 
                 <p> $qualification  </p>   

            
            </div>

        </div>

        ";

        }
        ?>


    </div>

 
</body>

</html>