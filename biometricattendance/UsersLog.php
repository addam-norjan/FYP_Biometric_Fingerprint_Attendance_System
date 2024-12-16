<?php
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['username'])) {
  header('Location: login.php');
  exit();
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Attendance Logs</title>
<link rel="stylesheet" type="text/css" href="css/userslog.css">
<script>
  $(window).on("load resize ", function() {
    var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
    $('.tbl-header').css({'padding-right':scrollWidth});
}).resize();
</script>
<script src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha1256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous">
</script>
<script src="js/jquery-2.2.3.min.js"></script>
<script src="js/user_log.js"></script>
<script>
  $(document).ready(function(){
      $.ajax({
        url: "user_log_up.php",
        type: 'POST',
        data: {
            'select_date': 1,
        }
      });
    setInterval(function(){
      $.ajax({
        url: "user_log_up.php",
        type: 'POST',
        data: {
            'select_date': 0,
        }
        }).done(function(data) {
          $('#userslog').html(data);
        });
    },5000);
  });
</script>
</head>
<body>
<h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
<?php include'header.php'; ?> 
<main>
  <section>
  <!--User table-->
  
  	<div class="form-style-5">
  		<form method="POST" action="Export_Excel.php">
  			<input type="date" name="date_sel" id="date_sel">
        <button type="button" name="user_log" id="user_log">Select Date</button>
  			<input type="submit" name="To_Excel" value="Export to Excel">
  		</form>
  	</div>
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Matric Number</th>
          <th>Fingerprint ID</th>
          <th>Date</th>
          <th>Sign In Time</th>
          <th>Sign Out Time</th>
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <div id="userslog"></div>
  </div>
</section>
</main>
</body>
</html>
