<?php
require('db_conn.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en" class="log">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signup/Login</title>

  <?php include('com/header_link.php'); ?>
</head>

<body class="sub">

<?php
// Display any message stored in the session
if (isset($_SESSION['message'])) {
    echo "<script>alert('" . $_SESSION['message'] . "');</script>";
    unset($_SESSION['message']); // Clear the message after showing it
}
?>

  <div class="wrapper">
    <div class="title-text">
      <div class="title login">Login Form</div>
      <div class="title signup">Signup Form</div>
    </div>
    <div class="form-container">
      <div class="slide-controls">
        <input type="radio" name="slide" id="login" checked>
        <input type="radio" name="slide" id="signup">
        <label for="login" class="slide login">Login</label>
        <label for="signup" class="slide signup">Signup</label>
        <div class="slider-tab"></div>
      </div>
      <div class="form-inner">
        <form action="action.php" class="login" method="post">
          <div class="field">
            <input type="text" placeholder="Email Address" name="email" required>
          </div>
          <div class="field">
            <input type="password" placeholder="Password" name="password">
          </div>
          <div class="pass-link"><a href="#">Forgot password?</a></div>
          <div class="field btn">
            <div class="btn-layer"></div>
            <input type="submit" value="Login" name="log">
          </div>
          <div class="signup-link">Not a member? <a href="">Signup now</a></div>
        </form>

        <form action="action.php" class="sign" method="post">
          <div class="field">
            <input type="text" placeholder="Enter full name" name="fullname" required>
          </div>
          <div class="field">
            <input type="text" placeholder="username" name="username" required>
          </div>
          <div class="field">
            <input type="text" placeholder="Email Address" name="email" required>
          </div>
          <div class="field">
            <input type="password" placeholder="Password" name="password" required>
          </div>

          <div class="field btn">
            <div class="btn-layer"></div>
            <input type="submit" value="Signup" name="sig">
          </div>
        </form>
      </div>
    </div>
  </div>

  <?php include('com/footer_link.php'); ?>

</body>
</html>
