<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="styles/style.css" />
  <link rel="shortcut icon" href="assets/enclave.ico" type="image/x-icon" />

  <title>Talent</title>
</head>

<body>
  <div id="app">
    <aside id="sidebar"></aside>
    <main>
      <div class="main-header row">
        <div class="container row">
          <h4>Talents</h4>
          <div class="main-header-tags">
            <a href="" class="tag"><?php
              if(isset($_GET['tag'])){
                echo ucfirst($_GET['tag']);
              }
              else{
                echo "All";
              }
            ?></a>
          </div>
        </div>
        <input type="text" class="search-bar" placeholder="Search for a topic" />
        <div class="row profile-details">
          <img src="assets/person.jpg" alt="" class="profile-photo" />
          <p>134321</p>
        </div>
      </div>

      <div class="main-container">

        <?php
        include('utils/db.php');
        include('utils/tags.php');

        $db = new Database();
        if (isset($_GET['tag'])) {
          $tag = $_GET['tag'];
          $query = "SELECT * FROM enclave.TALENT INNER JOIN enclave.student_details ON enclave.TALENT.student_number=enclave.student_details.student_number WHERE tags LIKE '%$tag%'";
        } else {
          $query = "SELECT * FROM enclave.TALENT INNER JOIN enclave.student_details ON enclave.TALENT.student_number=enclave.student_details.student_number";
        }

        $result = $db->executeQuery($query);

        while ($row = mysqli_fetch_assoc($result)) {
          $student_name = $row['student_fname'] . ' ' . $row['student_sname'];
          $image = $row['file'];
          $text = $row['caption'];
          $tags = $row['tags'];

          echo "
          <div class='talent-card row'>
          <img
            src='$image'
            alt=''
            class='talent-image'
          />
          <div class='talent-details'>
            <div class='profile-details row'>
              <img src='assets/person2.jpg' alt='' class='profile-photo' />
              $student_name
            </div>
            <p class='blog'>
              $text
            </p>

            <div class='talent-tags row'>
             " . build_tags($tags) . "
            </div>
          </div>
        </div>
          
          ";
        }
        ?>


      </div>
    </main>
  </div>
</body>
<script src="js/sidebar.js"></script>

</html>