<?php
  $studentID = $_POST['studentID'];
  // Get the list of subjectIDs selected and put into variable
  $subject_list = $_POST['subjectID'];
  // Loop through list of subjects
  foreach ($subject_list as $subjectID) {
    $sql = "INSERT INTO studentsubject (studentID, subjectID) VALUES
     ($studentID, $subjectID)";
    $qry = mysqli_query($dbconnect, $sql);
  }
 ?>
