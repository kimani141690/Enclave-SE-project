<?php

include('utils/db.php');
$disc_id = $_GET['id'];

$discussion_query = "SELECT * FROM enclave.DISCUSSION INNER JOIN enclave.student_details ON enclave.DISCUSSION.student_number=enclave.student_details.student_number WHERE discussion_id=$disc_id;";
$db = new Database();
$result = $db->executeQuery($discussion_query);

$discussion = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="styles/style.css" />
  <link rel="shortcut icon" href="assets/enclave.ico" type="image/x-icon">
  <title><?php echo $discussion['title']; ?></title>
</head>

<body>
  <div id="app">
    <aside id="sidebar"></aside>
    <main>
      <div class="main-header row">
        <div class="container row">
          <h4>Discussions</h4>
          <div class="main-header-tags">
            <a href="" class="tag">My day</a>
          </div>
        </div>
        <input type="text" class="search-bar" placeholder="Search for a topic" />
        <div class="row profile-details">
          <img src="assets/person.jpg" alt="" class="profile-photo" />
          <p>134321</p>
        </div>
      </div>
      <div class="main-container" id="main-forum-container">
        <div class="discussion-header">
          <?php
            $image = $discussion['image'];
          echo "<img src='$image' alt='' class='discussion-image' onerror='this.src=`./assets/confused.jpg`' />"; ?>
          <div class="discussion-details">
            <p class="discussion-title"><?php echo $discussion['title'] ?></p>
            <div class="row align-center">
              <div class="row align-center discussion-profile">
                <img src="assets/person.jpg" alt="" />
                <?php echo $discussion['student_fname']  . ' ' . $discussion['student_sname'] ?>
              </div>
              <p class="discussion-date"> <?php echo $db->format_date($discussion['date_disc_started']) ?>
              </p>
            </div>
          </div>
          <p class="discussion-interaction" onclick="makeReplyVisible()">Join Discussion</p>
        </div>
        <p class="blog">
          <?php echo $discussion['text'] ?>
        </p>
        <div class="form-container" id="forum-reply">
          <form action="php/reply_discussion.php" method="POST">
            <label for="">My comment</label>
            <textarea name="reply" id="forum-input"></textarea>
            <input type="hidden" name="disc_id" value="<?php echo $disc_id ?>">
            <button type="submit">Reply</button>
          </form>
        </div>
        <?php
        $query = "SELECT * FROM enclave.DISCUSSION_COMMENT INNER JOIN enclave.student_details ON enclave.student_details.student_number=enclave.DISCUSSION_COMMENT.student_number WHERE discussion=$disc_id ORDER BY date_made DESC;";

        $result = $db->executeQuery($query);

        while ($row = mysqli_fetch_assoc($result)) {
          $student_name = $row['student_fname'] . ' ' . $row['student_sname'];
          $reply_text = $row['text'];

          echo "
          <div class='discussion-reply'>

          <div class='reply-profile row'>
            <img src='assets/person.jpg' alt='' class='profile-photo' />
            $student_name
          </div>
          <p class='blog'>
           $reply_text
          </p>
        </div>
            
            ";
        }

        ?>
      </div>
    </main>
  </div>
</body>
<script src="js/sidebar.js"></script>
<script src="js/forum.js"></script>

</html>