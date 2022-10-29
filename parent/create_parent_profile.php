<?php
// if(isset($_POST['submitBtn']))
// {
// $fname=$_POST['fname'];
// $sname=$_POST['sname'];
// $user=$_POST['user'];

//genetaing user password
 //=========================================================================================


// $upp_case="ABCBEFGHIJKLMNOPQRSTUVWXYZ";
// $lower_case="abcdefghijklmnopqrstuvwxyz";
// $numbers="0123456789";
// $special_char="!@#$%*?";

// $generate_upp_case=substr(str_shuffle($upp_case),0,2);
// $generate_lower_case=substr(str_shuffle($lower_case),0,2);
// $generate_numbers=substr(str_shuffle($numbers),0,2);
// $generate_special_char=substr(str_shuffle($special_char),0,2);

// $mixed="$generate_upp_case$generate_lower_case$generate_numbers$generate_special_char";
//randomisinn password
//  $generated_mixed=substr(str_shuffle($mixed),0,8);

 //password salting and hashing
//  $salted="23456dxydb".$generated_mixed."ffd4q567yah";
//  $hashed=hash('sha512',$salted);

//  echo$hashed;

 //=========================================================================================

//creating user email
//-----------------------------------

// $email=$fname.$sname."@enclave.edu";
// echo$email;

//-------------------------------

// }

// ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Account Creation</title>
    <style>
        
*{
padding: 0;
border: 0;
margin: 0;

}
.account {

   background-color: #DED5D0;
   width: 100%;
   align-items: center;

}
.title{
   background-color: #ca9e93


}
form{

   margin-left: 30%;
}

h1 {

   text-decoration: underline;
   text-align: center;
   margin-top: 20px;
   margin-bottom: 15px;

}

label {
   width: 40px;
   height:30px ;
   margin-top: 20px;
   margin-bottom: 15px;
   margin-left: 100px;
   padding-left: 30px;
   color: black;
}

input {
   width: 200px;
   margin-left: 130px;
   padding-left: 30px;
   height:30px ;
   margin-top: 20px;
   margin-bottom: 15px;


}

select {
   width: 200px;
 padding-left: 30px;
 margin-left: 130px;

   width: 200px;
   height:30px ;

}

    </style>
</head>

<body>
    <div class="account">
        <div class="title">
            <h1>PARENT PROFILE</h1>
        </div>

        <form action="process_create_parent_profile.php" method="post">
           

            <label for="fname">First Name</label><br>
            <input type="text" name="fname" id="fname" placeholder="First Name"><br>

            <label for="sname">Second Name</label><br>
            <input type="text" name="sname" id="sname" placeholder="Second Name"><br>

            <label for="student_num">Student Number</label><br>
            <input type="text" name="student_num" id="student_num" placeholder="Student Number"><br>

            <label for="password"> Password</label><br>
            <input type="password" name="password" id="student_num" placeholder="Password"><br>

          
            <input type="submit" name="submitBtn" value="Crete Profile">

        </form>

    </div>
</body>

</html>