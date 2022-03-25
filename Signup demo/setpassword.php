<?php
include("dbconnect.php");
$temp = $_GET['temp'];
$userhash = $_GET['u'];
$userhash = "$2y$10$".$userhash;
$password = $_POST['password'];
 ?>

    <?php
      $sql = "SELECT * FROM user2 WHERE temp='$temp'";
      $qry = mysqli_query($dbconnect, $sql);
      if(mysqli_num_rows($qry)==0) {
        header("Location: http://www.google.com");
      } else {
        $aa = mysqli_fetch_assoc($qry);
        $username = $aa['username'];
      if(password_verify($username, $userhash)) {

        $passwordhash = password_hash("$password", PASSWORD_DEFAULT);

        $userID = $aa['userID'];
        $reset_sql = "UPDATE user2 SET password='$passwordhash', temp='' WHERE userID=$userID";
        $reset_qry = mysqli_query($dbconnect, $reset_sql);
} else {
  header("Location: http://www.stac.school.nz");

}

     ?>
    <h1>Password updated</h1>
<?php
}
 ?>
<p><a href="index.php">Log in</a></p>
<?php  ?>
