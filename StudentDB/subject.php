<!-- This page shows a class list for the selected subject -->
<?php
  // Get selected subject
  if(!isset($_GET['subjectID'])) {
    header("Location: index.php");
  } else {
    $subjectID = $_GET['subjectID'];
  }

  // Select everyone in the subject
  // Notice that we have to select from the linking table studentsubject
  // and then we join on the student table to get their names
  $students_sql = "SELECT student.* FROM studentsubject JOIN student ON studentsubject.studentID=student.studentID WHERE studentsubject.subjectID=$subjectID";
  $students_qry = mysqli_query($dbconnect, $students_sql);

  // Select subject name
  $subject_sql = "SELECT * FROM subject WHERE subjectID=$subjectID";
  $subject_qry = mysqli_query($dbconnect, $subject_sql);
  $subject_aa = mysqli_fetch_assoc($subject_qry);
  $subject = $subject_aa['subject'];
 ?>
<div class="container-fluid">
  <div class="row">
    <!-- Display subject name -->
    <h3 class="display-3"><?php echo $subject; ?></h3>
    <?php
      if(mysqli_num_rows($students_qry)==0) {
        echo "No students enrolled in this class";
      } else {
        $students_aa = mysqli_fetch_assoc($students_qry);
        do {
          $firstname = $students_aa['firstname'];
          $lastname = $students_aa['lastname'];
          $photo = $students_aa['photo'];
          $studentID = $students_aa['studentID'];
          echo "<div class='col-12 col-md-6 col-xl-4'>";
          echo "<div class='card'>";
          echo "<a href='index.php?page=student&studentID=$studentID'>";
          echo "<img src='images/$photo' class='card-img-top'>";
          echo "<div class='card-body'>";
          echo "<p class='card-text'>$firstname $lastname</p>";
          echo "</div></a>";
          echo "</div>";
          echo "</div>";
        }
          while ($students_aa = mysqli_fetch_assoc($students_qry));
      }

     ?>
  </div>
</div>
