<?php
include('dbconnect.php');
if(!isset($_GET['studentID']) or $_GET['studentID']=="") {
  echo "<h1>Welcome</h1>";
} else {
$studentID = $_GET['studentID'];
$sql = "SELECT * FROM student WHERE studentID=$studentID";
$qry = mysqli_query($dbconnect, $sql);
if(mysqli_num_rows($qry)==0) {
  echo "<h1>No student found</h1>";
} else {
$aa = mysqli_fetch_assoc($qry);
$name = $aa['firstname']. " ".$aa['lastname'];

echo "<h1>$name</h1>";
}
}
 ?>
