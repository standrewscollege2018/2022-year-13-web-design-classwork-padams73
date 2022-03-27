<?php
include('dbconnect.php');
$userID = $_GET['userID'];
// Select all users
// First we prepare the statement/query
$stmt = $dbconnect->prepare("SELECT * FROM user2 WHERE userID=?");
$stmt->bind_param("i", $userID);

// Run the query and get the results
$stmt->execute();
$result = $stmt->get_result();

// Fetch all results from $result and convert into an associative array
// This is so we can more easily extract the content and display it in PHP
// IMPORTANT: Notice we use a different approach when there is only one record
$userdetails = $result->fetch_assoc();
// Check if there are results first
if ($result->num_rows > 0) {

     // Putting content into variables to make it easier to echo
     $username = $userdetails['username'];
     $email = $userdetails['email'];
     // Display details
     echo "<p>$username : $email</p>";
     // Check if user has set their password yet
     if ($userdetails['password']=='') {
       echo "Password not yet set";
     } else {
       echo "Password set";
     }
  } else {
    echo "<p>No data found</p>";
 } ?>
