<?php
// Check to see if user is logged in

if(!isset($_SESSION['admin'])) {
  // Not logged in, redirect back to index page
  header("Location: index.php");
}
//  Check if all the fields (firstname, lastname, tutorgroupID, photo) are set

// If so, use the W3 Schools code to upload the image

// Include the INSERT query to add the record to the student table
// INSERT INTO student (firstname, lastname, tutorgroupID, photo) VALUES ()


 ?>
