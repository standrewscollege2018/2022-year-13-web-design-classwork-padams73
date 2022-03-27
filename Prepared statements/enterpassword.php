<?php
$user = $_GET['u'];
$userhash = "$2y$10$".$user;
$temp = $_GET['temp'];
 ?>
 <?php

  $stmt = $dbconnect->prepare("SELECT * FROM user2 WHERE temp=?");
   $stmt->bind_param("s", $temp);
   $stmt->execute();
   $result = $stmt->get_result();
   if($result->num_rows==0) {
     header("Location: index.php");
   } else {
     // $user = $result->fetch_all(MYSQLI_ASSOC);
     $userdetails = $result->fetch_assoc();
     $username = $userdetails['username'];
     if(password_verify($username, $userhash)) {
?>
<h1>Enter new password for <?php echo $username; ?></h1>

<form class="" action="index.php?page=setpassword&u=<?php echo $user; ?>&temp=<?php echo $temp; ?>" method="post">
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
  </div>

  <button type="submit" name="button" class="btn">Set password</button>
</form>


<?php
 } else {
 header("Location: index.php");
 }


 }
 ?>
