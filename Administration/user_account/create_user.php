<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
  <link rel="stylesheet" href="../side_bar.css">
  <link rel="stylesheet" href="create_user.css">
    <title>User Account Creation</title>
</head>

<body>
<?php include("../side_bar.php") ?>
  <div class="main-content">

  <header>
      <h2>ACCOUNT CREATION</h2>
    </header>

    <div class="form-box">
        <form action="process_create_user.php" method="POST">
           

            <label for="fname">First Name</label><br>
            <input type="text" name="fname" id="fname" placeholder=""><br>

            <label for="fname">Second Name</label><br>
            <input type="text" name="sname" id="sname" placeholder=""><br>

            <label for="user"> User Type</label><br>
            <select name="user" id="user">
                <option value="student">student</option>
                <option value="lecturer">lecturer</option>
                <option value="admin">admin</option>
            </select><br>

            <input type="submit" name="submitBtn" value="Create New User">

        </form>

    </div>
  </div>
</body>

</html>