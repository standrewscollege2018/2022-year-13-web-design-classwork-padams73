<?php
  

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "studentdb";

  // Create connection
  $dbconnect = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($dbconnect->connect_error) {
    die("Connection failed: " . $dbconnect->connect_error);
  }
 ?>
