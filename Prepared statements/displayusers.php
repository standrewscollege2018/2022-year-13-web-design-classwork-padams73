<?php
include('dbconnect.php');
// Select all users
// First we prepare the statement/query
$stmt = $dbconnect->prepare("SELECT * FROM user2");
// No need to bind any parameters as there aren't any
// I just left the comment below in so you could see what an integer parameter would look like
// $stmt->bind_param("i", $userID);

// Run the query and get the results
$stmt->execute();
$result = $stmt->get_result();

// Fetch all results from $result and convert into an associative array
// This is so we can more easily extract the content and display it in PHP
$data = $result->fetch_all(MYSQLI_ASSOC);
// Check if there are results first
if ($result->num_rows > 0) {
  // If there are results, display in a loop
  // Notice we are using a foreach loop rather than a do while loop
  // And notice how we can use the column headings from the database
  // This is because we turned it into an associative array first
   foreach($data as $row) {
     // Putting content into variables to make it easier to echo
     // Set them up as links so you can see how a select query
     // would work when there is only one record returned
     $userID = $row['userID'];
     $username = $row['username'];
     $email = $row['email'];
     echo "<p><a href='index.php?page=displayuser&userID=$userID'>$username : $email</a></p>";
    }
  } else {
    echo "<p>No data found</p>";
 } ?>
