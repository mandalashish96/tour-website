<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Desh Tour</title>
  <?php include('com/header_link.php'); ?>
</head>

<body>
  <!-- Navbar & Hero Start -->
  <div class="container-fluid position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
      <a href="index.php" class="navbar-brand p-0">
        <h1 class="m-0"><i class="fa-solid fa-mountain-sun"></i>Desh-TOUR</h1>
        
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="fa fa-bars"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0">
          <a href="index.php" class="nav-item nav-link">Home</a>
          <a href="about.php" class="nav-item nav-link">About</a>
          <a href="contact.php" class="nav-item nav-link">Contact</a>
          <a href="pcages.php" class="nav-item nav-link">Pckages</a>
          <a href="blog.php" class="nav-item nav-link">Blog</a>
        </div>
        <a href='booking.php' class='btn btn-primary rounded-pill py-2 px-4 ms-lg-4'>Booking</a>
        <?php
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
          $username = $_SESSION['username'];
          echo "
          <div class='dropdown'>
            <a href='#' class='btn btn-light rounded-circle dropdown-toggle' role='button' id='profileDropdown' data-bs-toggle='dropdown'>
              <i class='fa fa-user'></i> $username
            </a>
            <ul class='dropdown-menu dropdown-menu-end' aria-labelledby='profileDropdown'>
              <li><a class='dropdown-item' href='profile.php'>View Profile</a></li>
              <li><hr class='dropdown-divider'></li>
              <li><a class='dropdown-item' href='logout.php'>Logout</a></li>
            </ul>
          </div>";
        } else {
          echo "<a href='siginup.php' class='btn btn-primary rounded-pill py-2 px-4 ms-lg-4'>Login or Signup</a>";
        }
        ?>
      </div>
    </nav>
  </div>
  <?php include('com/footer_link.php'); ?>
</body>

</html>
