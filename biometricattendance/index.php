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
  <title>List of Enrolled Students</title>
<link rel="stylesheet" type="text/css" href="css/Users.css">
<script>
  $(window).on("load resize ", function() {
    var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
    $('.tbl-header').css({'padding-right':scrollWidth});
}).resize();
</script>
</head>
<body>
<h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
<?php include'header.php'; ?> 
<main>
  <section>
  <!--User table-->
  
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <!--th>ID | Name</th-->
          <th>ID</th>
          <th>Name</th>
          <th>Matric Number</th>
          <th>Gender</th>
          <th>Email</th>
          <th>Fingerprint ID</th>
          <th>Enrollment Date</th>
          <th>Enrollment Time</th>
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>
        <?php
          //Connect to database
          require'connectDB.php';

            $sql = "SELECT * FROM users WHERE NOT username='' ORDER BY id DESC";
            $result = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($result, $sql)) {
                echo '<p class="error">SQL Error</p>';
            }
            else{
              mysqli_stmt_execute($result);
                $resultl = mysqli_stmt_get_result($result);
              if (mysqli_num_rows($resultl) > 0){
                  while ($row = mysqli_fetch_assoc($resultl)){
          ?>
                      <TR>
                      <TD><?php echo $row['id'];?></TD>
                      <TD><?php echo $row['username'];?></TD>
                      <TD><?php echo $row['serialnumber'];?></TD>
                      <TD><?php echo $row['gender'];?></TD>
                      <TD><?php echo $row['email'];?></TD>
                      <TD><?php echo $row['fingerprint_id'];?></TD>
                      <TD><?php echo $row['user_date'];?></TD>
                      <TD><?php echo $row['time_in'];?></TD>
                      </TR>
        <?php
                }   
            }
          }
        ?>
      </tbody>
    </table>
  </div>
</section>
</main>
</body>
</html>