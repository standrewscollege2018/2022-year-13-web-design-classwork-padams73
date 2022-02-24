<?php
// Select all tutor groups
$tutor_sql = "SELECT * FROM tutorgroup";
$tutor_qry = mysqli_query($dbconnect, $tutor_sql);
$tutor_aa = mysqli_fetch_assoc($tutor_qry);
 ?>
 <!-- Navbar starts -->
 <nav class="navbar navbar-expand-lg custom-nav">
<div class="container-fluid">
  <!-- Stac logo is a link back to the homepage -->
 <a class="navbar-brand" href="index.php">St Andrew's College</a>
 <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
   <!-- <span class="navbar-toggler-icon"></span> -->
   <i class="bi bi-list text-white"></i>
 </button>
 <div class="collapse navbar-collapse" id="navbarSupportedContent">
   <ul class="navbar-nav me-auto mb-2 mb-lg-0">
     <!-- Dropdown of tutor groups -->
     <li class="nav-item dropdown">
       <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
         Tutor groups
       </a>
       <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
         <?php
           do {
             // Display all tutorgroup codes
             $tutorgroupID = $tutor_aa['tutorgroupID'];
             $tutorcode = $tutor_aa['tutorcode'];
             // Link goes to tutorgroup page, takes the ID of the selected tutorgroup
             echo "<li><a class='dropdown-item' href='index.php?page=tutorgroup&tutorgroupID=$tutorgroupID&tutorcode=$tutorcode'>$tutorcode</a></li>";

            } while ($tutor_aa = mysqli_fetch_assoc($tutor_qry))
         ?>
         <li><hr class="dropdown-divider text-light"></li>

         <li><a class="dropdown-item" href="index.php?page=allstudents">All students</a></li>
       </ul>
     </li>

   </ul>
   <!-- Search form goes to the searchresults page -->
   <form class="d-flex" action="index.php?page=searchresults" method="post">
     <div class="input-group align-middle">
       <!-- Don't forget to name the input textfield -->
      <input type="text" name="search" class="form-control" placeholder="Student search" aria-label="Search" aria-describedby="search-bar">
      <!-- Submit button -->
      <button class="btn btn-outline-light bg-light" type="submit" id="search-bar"><i class="bi bi-search text-dark"></i></button>
      </div>
    </form>
 </div>
</div>
</nav>
