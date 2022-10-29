<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <link rel="stylesheet" type="text/css" href="../login/login.css">
  <script src="https://kit.fontawesome.com/bd27c824e3.js" crossorigin="anonymous"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Reset Password</title>
</head>

<body>


  <div class="form">
    
    <span  style="font-size: 2rem;" class="form_title">Password Reset</span>
    <form class="content" action="process_reset_password.php" method="POST">
      <div class="field">
        <i class="icon fa-solid fa-user"></i>

        <input type="text" class="input" name="id_num" placeholder="Your ID..." required>
  
      </div>

      <div class="field">
      <i class=" icon fa-solid fa-lock"></i>
      <input type="password" class="input" name="password"  placeholder="New Password..." />
    
      </div>


      <input type="submit" name="reset" value="reset" class="btn" />
    </form>
  </div>
</body>

</html>