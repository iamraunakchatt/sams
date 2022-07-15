<?php
require('../config/webconfig.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="">
<meta name="robots" content="noindex, nofollow">
<title>Admin | SMART ATTENDANCE MARKING SYSTEMS</title>

<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

<link rel="stylesheet" href="assets/css/bootstrap.min.css">

<link rel="stylesheet" href="assets/css/font-awesome.min.css">

<link rel="stylesheet" href="assets/css/style.css">

<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
</head>
<body class="account-page">

<div class="main-wrapper">
<div class="account-content">
<div class="container">



<div class="account-box">
	
<div class="account-wrapper">
	<div class="account-logo" style="height:100px">
    <?php
	 $statement = $connection->prepare(
		"SELECT * FROM 03_admin_tbl ORDER BY id DESC LIMIT 1"
	   );
	   $statement->execute();
	   $result = $statement->fetchAll();
	   foreach($result as $row)
	   {
		?>
		<a href="admin-dashboard.html" style="float:left"><img src="assets/img/logo2.png" alt="Dreamguy's Technologies"></a><a href="admin-dashboard.html"  style="float:right"><img src="../sadmin/action/logo/<?php echo $row["logo"]; ?>" alt="Dreamguy's Technologies"></a>
		</div>
        
<h3 class="account-title">FIELD STAFF MANAGEMENT SYSTEM</h3>
<h3 class="account-title">स्मार्ट उपस्थिति अंकन प्रणाली</h3>
<h3 class="account-title"><?php echo $row["cname"]; ?></h3>
<p class="account-subtitle">Welcome Admin<br/>Please Signin to proceed</p>

<form method="post" action="login_exec.php">
<div class="form-group">
<label>Email Address</label>
<input class="form-control" name="username" type="text" placeholder="Enter Admin Email" required>
</div>
<div class="form-group">
<div class="row">
<div class="col">
<label>Password</label>
</div>

</div>
<div class="position-relative">
<input class="form-control" type="password" name="password" Placeholder="Enter Admin Password" id="password" required>
<span class="fa fa-eye-slash" id="toggle-password"></span>
</div>
</div>
<div class="form-group text-center">
<button class="btn btn-primary account-btn" type="submit">Login</button>
</div>
</form>

<?php
       }
       ?>
<div class="account-logo" style="margin-bottom: 10px;">
	<a href="admin-dashboard.html"><img src="assets/img/ASCITHUB.PNG" style="width: 50px;" alt="Dreamguy's Technologies"></a>
	</div>
	<p class="account-subtitle" style="font-size: 12px;margin-bottom:0px">Powered by : ASCITHUB</p>
</div>
</div>
</div>
</div>
</div>


<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="assets/js/app.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
$status=$_GET['status'];
if($status=="passwordwrong"){
?>
<script>
    Swal.fire({
  icon: 'error',
  title: 'Oops!!',
  text: 'Wrong Password',
})
</script>
<?php
}else if($status=="usernamewrong"){
	?>
<script>
    Swal.fire({
  icon: 'error',
  title: 'Oops!!',
  text: 'Wrong Username',
})
</script>
	<?php
}else if($status=="loggedout"){
	?>
<script>
    Swal.fire({
  icon: 'success',
  title: 'Successfully',
  text: 'Logged Out',
})
</script>
	<?php
}
?>
</body>
</html>