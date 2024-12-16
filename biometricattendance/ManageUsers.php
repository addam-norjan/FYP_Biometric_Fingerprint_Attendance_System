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
	<title>Manage Students</title>
<link rel="stylesheet" type="text/css" href="css/manageusers.css">
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
<script src="js/manage_users.js"></script>
<script>
  $(document).ready(function(){
  	  $.ajax({
        url: "manage_users_up.php"
        }).done(function(data) {
        $('#manage_users').html(data);
      });
    setInterval(function(){
      $.ajax({
        url: "manage_users_up.php"
        }).done(function(data) {
        $('#manage_users').html(data);
      });
    },5000);
  });
</script>
</head>
<body>
<h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
<?php include'header.php';?>
<main>
	
	
	<!--
	<div class="form-style-5">
		<div class="alert">
		<label id="alert"></label>
		</div>
		<form>
			<fieldset>
			<legend><span class="number">1 - </span>Fingerprint ID:</legend>
				<label>Enter an ID from 1 to 127:</label>
				<input type="number" name="fingerid" id="fingerid" placeholder="Fingerprint ID">
				<button type="button" name="fingerid_add" class="fingerid_add">Add Fingerprint ID</button>
			</fieldset>
			<fieldset>
				<legend><span class="number">2 - </span>Student Details</legend>
				<input type="text" name="name" id="name" placeholder="Name">
				<input type="text" name="number" id="number" placeholder="Matric Number">
				<input type="email" name="email" id="email" placeholder="Email">
				<label>Enrollment time:</label>
				<input type="time" name="timein" id="timein">
				<label>Gender:</label>
				<input type="radio" name="gender" class="gender" value="Female">Female
	          	<input type="radio" name="gender" class="gender" value="Male" checked="checked">Male
			</fieldset>
			<button type="button" name="user_add" class="user_add">Enroll</button>
			<button type="button" name="user_upd" class="user_upd">Update</button>
			<button type="button" name="user_rmo" class="user_rmo">Remove</button>
		</form>
	</div>

	<div class="section">
	
		<div class="tbl-header">
		    <table cellpadding="0" cellspacing="0" border="0">
		      <thead>
		        <tr>
	        	  <th>Fingerprint ID</th>
		          <th>Name</th>
		          <th>Gender</th>
		          <th>Matric Number</th>
		          <th>Enrollment Date</th>
		          <th>Enrollment Time</th>
		        </tr>
		      </thead>
		    </table>
		</div>
		<div class="tbl-content">
		    <table cellpadding="0" cellspacing="0" border="0">
		      <div id="manage_users"></div>
		</div>
	</div>

-->

<div class="row">
	<div class="column">
	<div class="form-style-5">
		<div class="alert">
		<label id="alert"></label>
		</div>
		<form>
			<fieldset>
			<legend><span class="number">1 - </span>Fingerprint ID:</legend>
				<label>Enter an ID from 1 to 127:</label>
				<input type="number" name="fingerid" id="fingerid" placeholder="Fingerprint ID">
				<button type="button" name="fingerid_add" class="fingerid_add">Add Fingerprint ID</button>
			</fieldset>
			<fieldset>
				<legend><span class="number">2 - </span>Student Details</legend>
				<input type="text" name="name" id="name" placeholder="Name">
				<input type="text" name="number" id="number" placeholder="Matric Number">
				<input type="email" name="email" id="email" placeholder="Email">
				<label>Enrollment time:</label>
				<input type="time" name="timein" id="timein">
				<label>Gender:</label>
				<input type="radio" name="gender" class="gender" value="Female">Female
	          	<input type="radio" name="gender" class="gender" value="Male" checked="checked">Male
			</fieldset>
			<button type="button" name="user_add" class="user_add">Enroll</button>
			<button type="button" name="user_upd" class="user_upd">Update</button>
			<button type="button" name="user_rmo" class="user_rmo">Remove</button>
		</form>
	</div>
	</div>

	<div class="column">
	<div class="tbl-header">
		    <table cellpadding="0" cellspacing="0" border="0">
		      <thead>
		        <tr>
	        	  <th>Fingerprint ID</th>
		          <th>Name</th>
		          <th>Gender</th>
		          <th>Matric Number</th>
		          <th>Email</th>
		          <th>Enrollment Date</th>
		          <th>Enrollment Time</th>
		        </tr>
		      </thead>
		    </table>
		</div>
		<div class="tbl-content">
		    <table cellpadding="0" cellspacing="0" border="0">
		      <div id="manage_users"></div>
		</div>
	</div>
</div>

</main>
</body>
</html>