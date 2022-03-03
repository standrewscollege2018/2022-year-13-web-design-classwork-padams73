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
      <form class="" action="index.php?page=enterstudent" method="post">
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

           ?>
           <!-- Display tutorgroups in a select menu -->
           <label for="tutorcode" class="form-label">Select tutor group</label>
           <select name="tutorcode" class="form-select" aria-label="tutorgroup">
             <!-- YOUR TASK: display each tutor group code in an option target,
           with value of tutorgroupID -->
             <option value="1">One</option>
             <option value="2">Two</option>
             <option value="3">Three</option>
           </select>
        </div>
        <div class="mb-3">
          <!-- Select an image for the student -->
          <!-- YOUR TASK: go to W3 Schools and look up how to upload an image. -->
        </div>
        <div class="mb-3">
          <?php
          // Check if there is an error being returned
            if(isset($_GET['error'])) {
              ?>
              <div class="alert alert-danger" role="alert">
                Please enter both first and last names
              </div>
              <?php
                          }
           ?>
        </div>
        <button type="submit" name="button" class="btn btn-primary">Add student</button>
      </form>
      <!-- Show alert if either the tutor name or code were not entered -->

    </div>
  </div>
</div>
