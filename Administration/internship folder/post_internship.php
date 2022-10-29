<?php
require '..\connection.php';
session_start();
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="post_internship.css">
    <title> Admin Internship Creationn</title>
   
</head>

<body>
    <div class="account">
        <div class="title">
            <h1> Admin Internship Creation</h1>
        </div>

        <form action="process_submit_internship.php" method="post" enctype="multipart/form-data">

            <div class="main1">
                <label for="cname" id="left"> Company Name</label>
                <label for="location" id="right" style="margin-left:340px ;">Location</label> <br>

                <input type="text" name="cname" id="left" placeholder="Company Name">
                <input type="text" name="location" id="right" placeholder="Location"><br>


                <label for="duration" id="left">Duration</label>
                <label for="slots" name="slots" id="right" style="margin-left:386px;">Slots Available</label><br>

                <input type="text" name="duration" id="left" placeholder="Duration">
                <input type="text" name="slots" id="right" placeholder="Total Slots"><br>


                <label for="deadline" id="left">Application Deadline</label>
                <label for="image" id="right" style="margin-left:312px;">Image path</label><br>

                <input type="date" name="deadline" id="left" placeholder="Deadline">
                <input type="file" name="imageFile" id="right" required><br>



            </div>

            <div class="main2">
                <label for="description" id="left">Description</label>
                <label for="location" id="right" style="margin-left:370px ;">requirements</label><br>

                <textarea name="description" id="left" cols="35" rows="3"></textarea>
                <textarea name="qualification" id="right" cols="35" rows="3" style="margin-left:173px ;"></textarea><br><br>


                <input type="submit" name="submitBtn" value="POST" style="margin-left:420px ;">
            </div>
        </form>

    </div>
</body>

</html>