<?php
$user = $_GET['u'];
$userhash = "$2y$10$".$user;
$temp = $_GET['temp'];
 ?>
 <?php
   $sql = "SELECT * FROM user2 WHERE temp='$temp'";
   $qry = mysqli_query($dbconnect, $sql);
   if(mysqli_num_rows($qry)==0) {
     header("Location: index.php");
   } else {
     $aa = mysqli_fetch_assoc($qry);
     $username = $aa['username'];
     if(password_verify($username, $userhash)) {
?>
<h1>Enter new password</h1>

<form class="" action="index.php?page=setpassword&u=<?php echo $user; ?>&temp=<?php echo $temp; ?>" method="post">
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
  </div>

  <button type="submit" name="button">Set password</button>
</form>


<?php
 } else {
 header("Location: index.php");
 }


 }
 ?>
