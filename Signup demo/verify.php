<!-- This page checks the username and password of the user -->
<?php
  session_start();

  include("dbconnect.php");
// Get username and password from login page
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Select the record with a matching username
  $user_sql = "SELECT * FROM user2 WHERE username='$username'";
  $user_qry = mysqli_query($dbconnect, $user_sql);

  // Check if there are any records with that username
  if(mysqli_num_rows($user_qry)==0) {
    // No records match this username, so redirect back to login page
    header("Location:index.php?page=login&error=fail");
  } else {
    // We have a match!
    // Let's check the password matches
    $user_aa = mysqli_fetch_assoc($user_qry);

    $hash_password = $user_aa['password'];
    // Check if passwords match
    if(password_verify($password, $hash_password)) {
      // It matches, so start a SESSION and redirect them to the admin panel
      $_SESSION['admin'] = $username;
      // Redirect to admin panel
      header("Location: index.php?page=adminpanel");
    } else {
      // Password didn't match. Redirect to login page
      header("Location:index.php?page=login&error=fail");
    }

  }






 ?>
