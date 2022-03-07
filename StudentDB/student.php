<!-- This page displays all information about a selected student -->
<?php
// Check if student has been selected
if(!isset($_GET['studentID'])) {
  header("Location: index.php");
} else {
  $studentID = $_GET['studentID'];
}
  // Start by selecting all information about the student
  // This includes their tutorgroup
$student_sql = "SELECT student.*, tutorgroup.tutorcode FROM student JOIN tutorgroup ON student.tutorgroupID=tutorgroup.tutorgroupID WHERE student.studentID=$studentID";
$student_qry = mysqli_query($dbconnect, $student_sql);
// Check that there is a student with that ID
  if(mysqli_num_rows($student_qry)==0) {
    header("Location: index.php");
  } else {
    $student_aa = mysqli_fetch_assoc($student_qry);
    $firstname = $student_aa['firstname'];
    $lastname = $student_aa['lastname'];
    $photo = $student_aa['photo'];
    $tutorcode = $student_aa['tutorcode'];



  }

 ?>

<div class="container-fluid">
  <div class="row">
    <div class="col-12 col-sm-6">
      <h3 class="display-4">Details</h3>
      <p>Name: <?php echo "$firstname $lastname"; ?></p>
      <p>Tutorgroup: <?php echo $tutorcode; ?></p>
      <h3>Subjects</h3>
      <?php
      // Now get all of their subjects
      // Notice how the query only returns the subject name, and is selecting from
      // the studentsubject linking table, joining onto the subject table to get the name
      $subject_sql = "SELECT subject.subject FROM studentsubject JOIN subject ON studentsubject.subjectID=subject.subjectID WHERE studentsubject.studentID=$studentID";
      $subject_qry = mysqli_query($dbconnect, $subject_sql);
      // If student has no subjects, display a message
      if(mysqli_num_rows($subject_qry)==0) {
        echo "<p>Student is not signed up for any subjects";
      } else {
        // Otherwise, loop through the subjects and display each
        $subject_aa = mysqli_fetch_assoc($subject_qry);
        do {
          $subject = $subject_aa['subject'];
          echo "<p>$subject</p>";
        } while ($subject_aa = mysqli_fetch_assoc($subject_qry));

      }
       ?>


    </div>
    <div class="col-12 col-sm-6">
      <img src="images/<?php echo $photo; ?>" class="img-fluid" alt="Photo of <?php echo $photo; ?>">
    </div>
  </div>
</div>
