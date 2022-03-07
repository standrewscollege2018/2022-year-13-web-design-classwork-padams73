<?php

// Check to see if user is logged in

if(!isset($_SESSION['admin'])) {
  // Not logged in, redirect back to index page
  header("Location: index.php");
}
//  Check if all the fields (firstname, lastname, tutorgroupID, photo) are set
if(!isset($_POST['firstname']) or !isset($_POST['lastname']) or !isset($_FILES["fileToUpload"]["name"])) {
  header("Location:index.php?page=addstudent&error=unset");
} else {
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $tutorgroupID =$_POST['tutorgroupID'];
  $photo = $_FILES["fileToUpload"]["name"];

// W3 Schools script
$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {

    $uploadOk = 1;
  } else {

    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {

  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {

  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  header("Location: index.php?page=addstudent&error=image");
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    // Insert query
    $add_sql = "INSERT INTO student (firstname, lastname, tutorgroupID, photo) VALUES ('$firstname', '$lastname', $tutorgroupID, '$photo')";
    $add_qry = mysqli_query($dbconnect, $add_sql);
    echo "Success!";
  } else {
    header("Location: index.php?page=addstudent&error=image");
  }
}



}

 ?>
