<!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>
  <link rel="stylesheet" type="text/css" href="css/login.css">

</head>
<body>
<div class="icon">
		<img src="icons/finger-print-icon.png">
	</div>
<h1>Fingerprint Attendance Management System</h1>

  <div class="container">
    
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
      <div class="form-group">
        
        <input type="text" name="username" id="username" required placeholder="Username">
      </div>
      <div class="form-group">
        
        <input type="password" name="password" id="password" required placeholder="Password">
      </div>
      <input type="submit" value="Login">
    </form>

    <?php
    // Include the database connection file
    require_once 'connectDB.php';

    // Start a new session
    session_start();

    // Check if the form was submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      // Retrieve the entered username and password
      $username = $_POST['username'];
      $password = $_POST['password'];

      // Query the database to check if the admin credentials are valid
      $query = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
      $result = mysqli_query($conn, $query);

      // Check if the query returned any rows
      if (mysqli_num_rows($result) > 0) {
        // Admin credentials are valid, redirect to the index.php page
        $_SESSION['username'] = $username;
        header('Location: index.php');
        exit();
      } else {
        // Admin credentials are invalid, display an error message
        echo '<details class="error-popup"><summary>Invalid username or password. Please try again.</summary></details>';
      }
    }
    ?>
  </div>
</body>
</html>
