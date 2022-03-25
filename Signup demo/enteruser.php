    <h1>New user entered</h1>
    <?php
    $username = $_POST['username'];
    $email = $_POST['email'];
    // Check if user already exists or if email is used
    $user_sql = "SELECT * FROM user2 WHERE username='$username'";
    $user_qry = mysqli_query($dbconnect, $user_sql);
    if (mysqli_num_rows($user_qry)>0) {
      header("Location: index.php?page=adduser&error=username");
    } else {
    $email_sql = "SELECT * FROM user2 WHERE email='$email'";
    $email_qry = mysqli_query($dbconnect, $email_sql);
    if (mysqli_num_rows($email_qry)>0) {
      header("Location: index.php?page=adduser&error=email");
    } else {
      // Generate temp scramble of 8 letters
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $temp = substr( str_shuffle( $chars ), 0, 8 );

    $sql = "INSERT INTO user2 (username, email, temp) VALUES ('$username', '$email', '$temp')";
    $qry = mysqli_query($dbconnect, $sql);

    // Generate email
    // the message
    $msg = "To finish setup of your account, click on the link below\nhttp://localhost/myownwork/signup/setpassword.php?temp=$temp";


    // send email
    mail("$email","New account setup",$msg);
     ?>
     <p>Email script not working, so follow the link</p>
     <?php
     // Hash the username and append that and temp scramble to link for setting password
     $userhash = password_hash("$username", PASSWORD_DEFAULT);
     $u = substr("$userhash", 7);
      ?>
<p><a href="index.php?page=enterpassword&u=<?php echo $u; ?>&temp=<?php echo $temp;?>">Click here to set your password</a></p>
<?php
}
}
 ?>
