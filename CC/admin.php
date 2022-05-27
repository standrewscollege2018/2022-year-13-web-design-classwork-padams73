<?php
include 'dbconnect.php';
session_start();

if (!isset($_SESSION['user']['permission']) OR $_SESSION['user']['permission']!=1) {

  header('Location: index.php?error=permission');
}
$admin = 1;
$category = "admin";
$navpage = "stats";


if (!isset($_GET['page'])) {
    $page = "Admin Panel";
}else {
  $page = $_GET['page'];
  $page = ucfirst($page);

}


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="icon" type="image/x-icon" href="images\Mariehaugif.png">
    <meta charset="utf-8">
    <?php echo "<title>$page</title>"?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="custom.css">
  </head>
  <body class="d-flex flex-column min-vh-100">
    <div class="container-fluid">
      <?php
      include 'adminheader.php';
       ?>
      <!-- Content -->
      <?php
      if (!isset($_GET['page'])) {
          include 'adminpanel.php';
      }else {
        $page = $_GET['page'];
        include("$page.php");

      }

       ?>
      <!-- Footer -->

    </div>
    <footer class="bg-red p-3 mt-auto text-center">
      <p class="col text-light mb-0">"Mairetia i te Mātauranga. Be fragrant with wisdom"</p>
    </footer>

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  </body>
</html>
