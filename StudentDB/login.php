<!-- This is the login page, where the user can enter their username and password -->
<?php
// Check to see if user is logged in
if(isset($_SESSION['admin'])) {
  // Already logged in, redirect to the admin panel
  header("Location: index.php?page=adminpanel");
}

 ?>
 <div class="container-fluid">
   <div class="row mt-3">
     <div class="col-12 col-sm-4">

        <!-- The login form goes here -->
        <!-- Notice that the form goes to verify.php, which is a standalone page, not within index.php -->
        <form action="verify.php" method="post">
          <div class="form-group">
            <label for="username">Username</label>
            <input name="username" type="text" class="form-control" placeholder="Enter username">
              </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input name="password" type="password" class="form-control" placeholder="Password">
          </div>
          <?php
          // If username/password combination is wrong, display an error
            if(isset($_GET['error'])) {
              ?>
              <div class="alert alert-danger" role="alert">
                Username or password is incorrect
              </div>
              <?php
            }
           ?>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
</div>
