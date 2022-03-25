
    <h1>New user</h1>
    <form class="" action="index.php?page=enteruser" method="post">
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" name="username" class="form-control" id="username" placeholder="Username" required>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" required>
      </div>
      <?php
        if(isset($_GET['error'])) {
          if ($_GET['error'] == 'username') {
            ?>
            <div class="alert alert-danger" role="alert">
              Username is already in use!
            </div>
            <?php
          } else if ($_GET['error'] == 'email') {
            ?>
            <div class="alert alert-danger" role="alert">
              Email is already in use!
            </div>
            <?php
          }
        }
       ?>

      <button type="submit" name="button" class="btn btn-primary">Add user</button>
    </form>
