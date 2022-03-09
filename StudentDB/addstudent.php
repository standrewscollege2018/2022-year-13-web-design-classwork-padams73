<?php

// Check to see if user is logged in

if(!isset($_SESSION['admin'])) {
  // Not logged in, redirect back to index page
  header("Location: index.php");
}

 ?>
<div class="container-fluid">
  <div class="row">
    <div class="col p-3">
      <p class="display-2">Enter new student</p>
      <!-- When form is submitted, post information to the enterstudent page -->
      <form class="" action="index.php?page=enterstudent" method="post" enctype="multipart/form-data">
        <div class="mb-3">
          <!-- Get the tutor's name -->
          <label for="firstname" class="form-label">First name</label>
          <input type="text" name="firstname" class="form-control" id="firstname" aria-describedby="firstname">
        </div>
        <div class="mb-3">
          <!-- Get the 3-letter tutor code -->
          <label for="lastname" class="form-label">Last name</label>
          <input type="text" name="lastname" class="form-control" id="lastname" aria-describedby="lastname">
        </div>
        <div class="mb-3">
          <!-- Select tutor group -->
          <?php
            // YOUR TASK: Get all tutor groups available for selection
            // Run an SQL SELECT query to get all tutor groups
            $tutorgroup_sql = "SELECT * FROM tutorgroup";
            $tutorgroup_qry = mysqli_query($dbconnect, $tutorgroup_sql);
            $tutorgroup_aa = mysqli_fetch_assoc($tutorgroup_qry);
           ?>
           <!-- Display tutorgroups in a select menu -->
           <label for="tutorcode" class="form-label">Select tutor group</label>
           <select name="tutorgroupID" class="form-select" aria-label="tutorgroup">
             <!-- YOUR TASK: display each tutor group code in an option target,
           with value of tutorgroupID -->
           <!-- Loop through the tutorgroups and display a new option for each one -->
           <?php
            do {

              $tutorgroupID = $tutorgroup_aa['tutorgroupID'];
              $tutorcode = $tutorgroup_aa['tutorcode'];

              echo "<option value=$tutorgroupID>$tutorcode</option>";
            } while ($tutorgroup_aa = mysqli_fetch_assoc($tutorgroup_qry))

            ?>



           </select>
        </div>
        <div class="mb-3">
          <!-- Select an image for the student -->
          <input class="form-control" type="file" name="fileToUpload" id="fileToUpload">
          </div>
        <div class="mb-3">
          <?php
          // Check if there is an error being returned
            if(isset($_GET['error'])) {
              // Check the type of error and display appropriate error message
              if($_GET['error']=="type") {
                ?>
                <div class="alert alert-danger" role="alert">
                  Incorrect file type. Must be jpg, png or gif
                </div>
                <?php
              } else if ($_GET['error']=="size") {
                ?>
                <div class="alert alert-danger" role="alert">
                  File is too big. It must be less than 5Mb
                </div>
                <?php
              } else if ($_GET['error']=="exists") {
                ?>
                <div class="alert alert-danger" role="alert">
                  File already exists
                </div>
                <?php
              } else if ($_GET['error']=="upload") {
                ?>
                <div class="alert alert-danger" role="alert">
                  Error uploading file. Please try again
                </div>
                <?php
              } else {
                ?>
                <div class="alert alert-danger" role="alert">
                  Please enter both first and last names
                </div>
                <?php
              }

                          }
           ?>
        </div>
        <button type="submit" name="button" class="btn btn-primary">Add student</button>
      </form>
      <!-- Show alert if either the tutor name or code were not entered -->

    </div>
  </div>
</div>
