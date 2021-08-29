<?php
include('connection.php');
session_start();

if(isset($_SESSION['login_user'])) {
  header("location: registration-new.php");

} else {
  $error = '';
  if($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['username']) || empty($_POST['password'])) {
      $error = "Username or Password is invalid";
    } else {
      $username = $_POST['username'];
      $password = $_POST['password'];
      $username = mysqli_real_escape_string($conn, $username);
      $password = mysqli_real_escape_string($conn, $password);
      $query = mysqli_query($conn, "SELECT * FROM tbl_userinformation WHERE Password = '$password' AND Username = '$username'");
      $rows = mysqli_num_rows($query);
      if ($rows == 1) {
        $_SESSION['login_user'] = $username; // Initializing Session
        header("location: registration-new.php");
      } else {
        $error = "Username or Password is invalid.";
      }
      mysqli_close($connection);
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Login - Jagas MedicaDenta Corporation</title>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body>
	<div class="container-fluid banner">
	</div>
	<div class="container-fluid main-con">
<div class="container form-login">
  <h2>Login</h2>
  <form action="" class="needs-validation" method="POST">
    <div class="form-group">
      <label for="uname">Username:</label>
      <input type="text" class="form-control" id="uname" placeholder="Enter username" name="username" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <div class="form-group form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember" required> Remember me
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Check this checkbox to continue.</div>
      </label>
    </div>
    <button type="submit" class="btn btn-primary" style="width: 100%;"><h5>Log In</h5></button>
  </form>
</div>
</div>
<div class="container-fluid split">
	</div>
	<div class="container-fluid footer">
		<div class="row">
			<div class="col">
				JMDC - Jagas MedicaDenta Corporation<br>
				#46 Filipinas Avenue, United Parañaque Subd. 5,<br>Sucat, Paranaque City
			</div>
			<div class="col text-right">
				© 2021. All rights reserved.
			</div>
		</div>
	</div>	
<script>
(function() {
  'use strict';
  window.addEventListener('load', function() {
    var forms = document.getElementsByClassName('needs-validation');
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
	
</body>
</html>