<div class="container-fluid">
  <div class="row g-3">
    <?php
    // Check if tutorgroupID has been set first
    if(!isset($_GET['tutorgroupID'])) {
      header("Location: index.php");
    } else {
      // Get student details
      $tutorcode = $_GET['tutorcode'];
      $tutorgroupID = $_GET['tutorgroupID'];
      $tutor_sql = "SELECT * FROM student WHERE tutorgroupID=$tutorgroupID";
      $tutor_qry = mysqli_query($dbconnect, $tutor_sql);
      // If no students in tutor group, display a message
      if(mysqli_num_rows($tutor_qry)==0) {
        echo "<p>No students in $tutorcode</p>";
      } else {
        // Display tutorgroup code
        $tutor_aa = mysqli_fetch_assoc($tutor_qry);
        echo "<h1>$tutorcode</h1>";
        // Display each student in a card
        do {
          $firstname = $tutor_aa['firstname'];
          $lastname = $tutor_aa['lastname'];
          $photo = $tutor_aa['photo'];
          echo "<div class='col-12 col-md-6 col-xl-4'>";
          echo "<div class='card'>";
          echo "<img src='images/$photo' class='card-img-top'>";
          echo "<div class='card-body'>";
          echo "<p class='card-text'>$firstname $lastname</p>";
          echo "</div>";
          echo "</div>";
          echo "</div>";
          /*
          The commented-out content is another way you could combine
          PHP and Bootstrap. In the below method, we stop PHP each time
          we want to add HTML, and then reopen the PHP when using it.
          ?>
          <div class='col-12 col-md-6 col-xl-4'>
            <div class='card'>
              <img src='images/<?php echo $photo; ?>' class='card-img-top'>
              <div class='card-body'>
                <p class='card-text'><?php echo $firstname $lastname; ?></p>
              </div>
            </div>
          </div>
          <?php */
        } while ($tutor_aa = mysqli_fetch_assoc($tutor_qry));
      }
    }

    ?>
  </div>
</div>
