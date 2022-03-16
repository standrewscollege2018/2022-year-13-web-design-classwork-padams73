<?php
session_start();

include("dbconnect.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Student sign out system</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="custom.css">
    <!-- Javascript to call function when checkbox is selected or deselected -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

    <script type="text/javascript">
    // This function takes the studentID entered and gets their details
    // The studentDetails.php page is then updated
    function selectStudent(studentID) {

      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("log").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","studentDetails.php?studentID="+studentID,true);
    xmlhttp.send();
    }

  </script>
  </head>
  <body>

  <input type="text" name="studentID" value="" onkeyup="selectStudent(this.value)">

<div id="log">
  <h1>Welcome</h1>
</div>
  </body>
</html>
