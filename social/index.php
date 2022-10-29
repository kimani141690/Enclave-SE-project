<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="styles/style.css" />
  <link rel="shortcut icon" href="assets/enclave.ico" type="image/x-icon" />

  <title>Forums</title>
</head>

<body>
  <div id="app">
    <aside id="sidebar"></aside>
    <main>
      <div class="main-header row">
        <div class="container row">
          <h4>Discussions</h4>
          <div class="main-header-tags">
            <a href="" class="tag">
              <?php
              if (isset($_GET['tag'])) {
                echo ucfirst($_GET['tag']);
              } else {
                echo "All";
              }
              ?>
            </a>
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
          $query = "SELECT * FROM enclave.DISCUSSION INNER JOIN enclave.student_details ON enclave.DISCUSSION.student_number=enclave.student_details.student_number WHERE tags LIKE '%$tag%' ORDER BY date_disc_started DESC ;";
        } else {
          $query = "SELECT * FROM enclave.DISCUSSION INNER JOIN enclave.student_details ON enclave.DISCUSSION.student_number=enclave.student_details.student_number ORDER BY date_disc_started DESC;";
        }

        $result = $db->executeQuery($query);

        while ($row = mysqli_fetch_assoc($result)) {
          $student_name = $row['student_fname'] . ' ' . $row['student_sname'];
          $disc_id = $row['discussion_id'];
          $title = $row['title'];
          $image = $row['image'];
          $date_made = $row['date_disc_started'];
          $tags = $row['tags'];
          $date_made = date_create($date_made);
          $comment_count_query = "SELECT * FROM enclave.DISCUSSION_COMMENT WHERE discussion=$disc_id";
          $comment_count = mysqli_num_rows($db->executeQuery($comment_count_query));
          $date = date_format($date_made, "jS F Y");
          echo "
          <a href='forum.php?id=$disc_id'>
          <div class='discussion-card'>
            <img src='$image' alt='' class='discussion-image' onerror='this.src=`./assets/confused.jpg`' />
            <div class='discussion-details'>
              <p class='discussion-title'>$title</p>
              <div class='row align-center'>
                <div class='row align-center discussion-profile'>
                  <img src='assets/person.jpg' alt='' />
                  $student_name
                </div>
                <p class='discussion-date'>$date</p>
              </div>
              <div class='talent-tags row'>
             " . build_tags($tags, 'index.php') . "
            </div>
            </div>
            <p class='discussion-interaction'>$comment_count interactions</p>
          </div>
        </a>
          
          ";
        }
        ?>


      </div>
    </main>
  </div>
</body>
<script src="js/sidebar.js"></script>

</html>