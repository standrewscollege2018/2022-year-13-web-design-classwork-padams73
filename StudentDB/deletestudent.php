<!-- This page deletes the selected student from the database -->
<?php

// Check if student has been selected
  if(!isset($_GET['studentID'])) {
    // If not, redirect back to deletestudentselect.php
    header("Location: index.php?page=deletestudentselect&error=noselect");
  } else {
    // Set variable to store studentID
    $studentID = $_GET['studentID'];

    // Get the name of the photo file for this student so we can delete it too
    $photo_sql = "SELECT photo from student WHERE studentID=$studentID";
    $photo_qry = mysqli_query($dbconnect, $photo_sql);
    $photo_aa = mysqli_fetch_assoc($photo_qry);
    $photo = $photo_aa['photo'];
    // Delete the photo using the unlink() function
    // Set file path first
    $file_path = "images/".$photo;
    echo $file_path;
      unlink("$file_path");



    // Delete the student
    $sql = "DELETE FROM student WHERE studentID = $studentID";
    $qry = mysqli_query($dbconnect, $sql);
    echo "<h2>Student deleted</h2>";
  }

 ?>
 <p>Student successfully deleted</p>
 <a href="index.php">Back to home page</a>
