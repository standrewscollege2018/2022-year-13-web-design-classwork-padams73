<!-- This page is where the admin can select the student they wish to delete -->


<h2>Select student to delete</h2>
<div class="row">


<?php
// Select all students
  $student_sql = "SELECT * FROM student";
  $student_qry = mysqli_query($dbconnect, $student_sql);
// If there are no students, display a message
  if(mysqli_num_rows($student_qry)==0) {
    echo "<p>No students in database</p>";
  } else {
    // If there are students, display them as image links
    $student_aa = mysqli_fetch_assoc($student_qry);


    do {
      $studentID = $student_aa['studentID'];
      $firstname = $student_aa['firstname'];
      $lastname = $student_aa['lastname'];
      $photo = $student_aa['photo'];
?>
<div class="col-md-4">


<?php
      echo "<a href='index.php?page=deletestudentconfirm&studentID=$studentID'><img src='images/$photo' class='img-fluid'>";
      echo "<p>$firstname $lastname</p></a>";
?>
</div><?php
    } while ($student_aa = mysqli_fetch_assoc($student_qry));
  }


?>
</div>
