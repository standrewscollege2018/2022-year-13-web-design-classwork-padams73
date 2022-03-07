<!-- Container div to hold all content -->
<div class="container-fluid">
  <!-- Start a new row to contain all columns -->
  <div class="row g-3">
<?php
// If user came here without submitting a search, redirect to index page
  if(!isset($_POST['search'])) {
    header("Location: index.php");
  }
  // Get what they entered in the search field
  $search = $_POST['search'];
  // Select students with matching names
  $result_sql = "SELECT * FROM student WHERE firstname LIKE '%$search%' OR lastname LIKE '%$search%'";

  $result_qry = mysqli_query($dbconnect, $result_sql);
  // If no results, display message
  if(mysqli_num_rows($result_qry)==0) {
      echo "<div class='col pt-3'><h2>No results found</h2></div>";
    } else {
      $result_aa = mysqli_fetch_assoc($result_qry);
      // Display each student in a card
      do {
        $firstname = $result_aa['firstname'];
        $lastname = $result_aa['lastname'];
        $photo = $result_aa['photo'];
        $studentID = $result_aa['studentID'];
        echo "<div class='col-12 col-md-6 col-xl-4'>";
        echo "<div class='card'>";
        echo "<a href='index.php?page=student&studentID=$studentID'>";
        echo "<img src='images/$photo' class='card-img-top'>";
        echo "<div class='card-body'>";
        echo "<p class='card-text'>$firstname $lastname</p>";
        echo "</div></a>";
        echo "</div>";
        echo "</div>";
        } while ($result_aa = mysqli_fetch_assoc($result_qry));


  }

 ?>
</div>
</div>
