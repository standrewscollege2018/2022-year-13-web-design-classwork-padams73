    <h1>New user entered</h1>
    <?php
    // Collect the username and email from the form content posted from adduser.php
    $username = $_POST['username'];
    $email = $_POST['email'];
    // Check if user already exists or if email is used

    // First we check if the username already exists in the database
    // Notice how we 'prepare' the statement/query to be run
    // The question mark represents the location of a parameter that will be inserted
    // into the query
    $stmt = $dbconnect->prepare("SELECT * FROM user2 WHERE username=?");
    // Once we have prepared the statement, we bind the parameter(s)
    // The first entry in the bracket tells the data type: s for string, i for integer
    // The line below says that there is a string, and that the $username variable contents
    // should be inserted where the question mark is in the query
    $stmt->bind_param("s", $username);
    // Now we run(execute) the query
    $stmt->execute();
    // Finally, because it is a SELECT query, we need to get the result
    $result = $stmt->get_result();

    // Now we check if there were any results, using num_rows
    if ($result->num_rows > 0) {
      header("Location: index.php?page=adduser&error=username");
    } else {
      // Again, we are preparing the query first. This time to check the email address
      $stmt = $dbconnect->prepare("SELECT * FROM user2 WHERE email=?");
      $stmt->bind_param("s", $email);
      $stmt->execute();
      $result = $stmt->get_result();

    if ($result->num_rows > 0) {
      header("Location: index.php?page=adduser&error=email");
    } else {

      // Generate temp scramble of 8 letters
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $temp = substr( str_shuffle( $chars ), 0, 8 );

    // This insert query has three parameters, so there are 3 question marks
    // Each is a string, hence the "sss" in the bind_param() part
    $stmt = $dbconnect->prepare("INSERT INTO user2 (username, email, temp) VALUES (?,?,?)");
    $stmt->bind_param("sss", $username, $email, $temp);
    $stmt->execute();


    // Generate email
    // the message
    $msg = "To finish setup of your account, click on the link below\nhttp://localhost/myownwork/signup/setpassword.php?temp=$temp";


    // send email
    mail("$email","New account setup",$msg);
     ?>
     <p>Email script not working, so follow the link</p>
     <?php
     // Hash the username and append that and temp scramble to link for setting password
     // This may be unnecessary, just trying to be as secure as possible
     $userhash = password_hash("$username", PASSWORD_DEFAULT);
     $u = substr("$userhash", 7);
      ?>
<p><a href="index.php?page=enterpassword&u=<?php echo $u; ?>&temp=<?php echo $temp;?>">Click here to set your password</a></p>
<?php
}
}
 ?>
