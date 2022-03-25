<!-- This is the navbar, which is included in the index page, so appears throughout the site -->




<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php"><h1>Sign up system</h1></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <!-- Login link -->
      <li class="nav-item">
        <!-- Check if user is already logged in.  -->
        <?php
          if(isset($_SESSION['admin'])) {
            // If logged in, display link to admin panel
            echo "<a class='nav-link' href='index.php?page=adminpanel'>Admin </a>";
          } else {
            // If not logged in, display login link
            echo "<a class='nav-link' href='index.php?page=login'>Login </a>";
          }

         ?>

      </li>
      <!-- Display all tutorgroups in a dropdown menu -->
      <li class="nav-item">
        <a class='nav-link' href='index.php?page=adduser'>Signup</a>
      </li>


  </div>
</nav>
