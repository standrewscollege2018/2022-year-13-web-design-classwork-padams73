<?php

// Check to see if user is logged in

if(!isset($_SESSION['admin'])) {
  // Not logged in, redirect back to index page
  header("Location: index.php");
}


  // Check if both tutorcode and tutor name have been set.
  // If not, return browser to addtutor page with an error
  if($_POST['tutor']=="" or $_POST['tutorcode']=="") {
    header("Location: index.php?page=addtutor&error=blank");
  } else {

  // Set up variables storing both the tutor name and the tutorcode
  // We use mysqli_real_escape_string() to prevent SQL injection attacks
  // We also use the strlen() function to double-check that the tutor
  // code is 3 characters long

  $tutor = mysqli_real_escape_string($dbconnect, $_POST['tutor']);
  $tutorcode = mysqli_real_escape_string($dbconnect, $_POST['tutorcode']);

  if (strlen($tutorcode) != 3) {
    header("Location: index.php?page=addtutor&error=length");
  }
  else {
  // Before adding record, check if it already exists
  // (Only do this if you can't have duplicate records)
  $check_sql = "SELECT * FROM tutorgroup WHERE tutorcode='$tutorcode'";
  $check_qry = mysqli_query($dbconnect, $check_sql);
  if(mysqli_num_rows($check_qry)>0) {
    header("Location: index.php?page=addtutor&error=exists");
  } else {
    // Run the insert query that adds the new tutor into the tutorgroup table
    $insert_sql = "INSERT INTO tutorgroup (tutor, tutorcode) VALUES ('$tutor', '$tutorcode')";
    $insert_qry = mysqli_query($dbconnect, $insert_sql);
  }
}

}
 ?>
 <!-- Display a success message -->
<div class="container-fluid">
  <div class="row">
    <div class="col">
      <p class="display-2">New tutor successfully added</p>
    </div>
  </div>
</div>
