<!-- This page logs the admin out by unsetting the admin session -->
<?php
// Start sessions running on the page
  session_start();
  // Unset the admin session, effectively logging the user out
  unset($_SESSION['admin']);
  // Redirect them back to the home page
  header("Location: index.php");
 ?>
