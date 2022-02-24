<!-- This page deletes the selected student from the database -->
<?php

// Check if student has been selected
  if(!isset($_GET['studentID'])) {
    // If not, redirect back to deletestudentselect.php
    header("Location: index.php?page=deletestudentselect&error=noselect");
  } else {
    // Delete selected student
    $studentID = $_GET['studentID'];
    $sql = "DELETE FROM student WHERE studentID = $studentID";
    $qry = mysqli_query($dbconnect, $sql);
    echo "<h2>Student deleted</h2>";
  }

 ?>
 <a href="index.php">Back to home page</a>
