<?php

$temp = $_GET['temp'];
$userhash = $_GET['u'];
$userhash = "$2y$10$".$userhash;
$password = $_POST['password'];
 ?>

    <?php
    $stmt = $dbconnect->prepare("SELECT * FROM user2 WHERE temp=?");
     $stmt->bind_param("s", $temp);
     $stmt->execute();
     $result = $stmt->get_result();
      if($result->num_rows==0) {
        header("Location: http://www.google.com");
      } else {
        // $user = $result->fetch_all(MYSQLI_ASSOC);
        $user = $result->fetch_assoc();
        $username = $user['username'];
      if(password_verify($username, $userhash)) {

        $passwordhash = password_hash("$password", PASSWORD_DEFAULT);

        $userID = $user['userID'];
        $stmt = $dbconnect->prepare("UPDATE user2 SET password=?, temp='' WHERE userID=?");
        $stmt->bind_param("si",$passwordhash, $userID);
        $stmt->execute();

} else {
  header("Location: http://www.stac.school.nz");

}

     ?>
    <h1>Password updated for <?php echo $username; ?></h1>
<?php
}
 ?>
<p><a href="index.php">Log in</a></p>
<?php  ?>
