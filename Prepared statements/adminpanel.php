<?php

// Check to see if user is logged in
if(!isset($_SESSION['admin'])) {
  // Already logged in, redirect to the admin panel
  header("Location: index.php");
} else {

 ?>
<p><a href="logout.php">Logout<a/></p>
  <?php
}
 ?>
