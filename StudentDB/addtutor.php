<div class="container-fluid">
  <div class="row">
    <div class="col p-3">
      <!-- When form is submitted, post information to the entertutor page -->
      <form class="" action="index.php?page=entertutor" method="post">
        <div class="mb-3">
          <!-- Get the tutor's name -->
          <label for="tutor" class="form-label">Tutor name</label>
          <input type="text" name="tutor" class="form-control" id="tutor" aria-describedby="tutor">
        </div>
        <div class="mb-3">
          <!-- Get the 3-letter tutor code -->
          <label for="tutorcode" class="form-label">Tutor code (max 3 characters)</label>
          <input type="text" name="tutorcode" class="form-control" id="tutorcode" aria-describedby="tutorcode" maxlength=3>
        </div>
        <div class="mb-3">
          <?php
          // Check if there is an error being returned
            if(isset($_GET['error'])) {
              // One or both fields were blank
              if($_GET['error']=='blank') {


              ?>
              <div class="alert alert-danger" role="alert">
                Please enter both the tutor name and code
              </div>
              <?php
              // Tutor already exists
            } else if ($_GET['error']=='exists') {
              ?>
              <div class="alert alert-danger" role="alert">
                Tutor code already exists
              </div>
              <?php
              // Tutorcode was not 3 characters long
            } else if ($_GET['error']=='length') {
              ?>
              <div class="alert alert-danger" role="alert">
                Tutor code must be 3 characters long
              </div>
              <?php
            }
            }
           ?>
        </div>
        <button type="submit" name="button" class="btn btn-primary">Add tutor</button>
      </form>
      <!-- Show alert if either the tutor name or code were not entered -->

    </div>
  </div>
</div>
