<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
session_start();
if(isset($_SESSION['SAMSSuperadminLogin'])){
	header("location: index.php");
}else{
    
}

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
<title>SAMS-Super Admin</title>

<link rel="shortcut icon" type="image/x-icon" href="assets/img/logo2.png">

<link rel="stylesheet" href="assets/css/bootstrap.min.css">

<link rel="stylesheet" href="assets/css/font-awesome.min.css">

<link rel="stylesheet" href="assets/css/style.css">

<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
<style type="text/css">
<!--
.style1 {font-size: 36px}
-->
</style>
</head>
<body class="account-page">

<div class="main-wrapper">
<div class="account-content">
<div class="container">
  <div class="account-box">
    <div class="account-wrapper">
      <div class="account-logo"> <a href="admin-dashboard.html"><img src="assets/img/logo2.png" alt="Dreamguy's Technologies"></a> </div>
      <h3 class="account-title style1"><img src="assets/img/sams.png"></h3>
	  <h3 class="account-title">SMART ATTENDANCE  MANAGEMENT SYSTEM</h3>
      <p align="left" class="account-subtitle"><strong>Welcome Super Admin</strong><br/>
        <strong> Please Signin to proceed</strong></p>
      <form method="post" action="action/login_action.php">
        <div class="form-group">
          <label>E-mail Address</label>
          <input class="form-control" name="username" type="text" placeholder="Enter Super Admin Email" required>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col">
              <label>Password</label>
            </div>
          </div>
          <div class="position-relative">
            <input class="form-control" type="password" name="password" placeholder="Enter Super Admin Password" id="password" required>
            <span class="fa fa-eye-slash" id="toggle-password"></span> </div>
        </div>
        <div class="form-group text-center">
          <button class="btn btn-primary account-btn" type="submit">Login</button>
        </div>
      </form>
      <div class="account-logo" style="margin-bottom: 10px;"> <a href="admin-dashboard.html"><img src="assets/img/ASCITHUB.PNG" style="width: 50px;" alt="Dreamguy's Technologies"></a> </div>
      <p class="account-subtitle" style="font-size: 12px;margin-bottom:0px"><a href="https://ascinfo.in/" target="_blank">Powered by : ASCITHUB</a></p>
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
}else if($status=="alreadyloggedin"){
	?>
<script>
    Swal.fire({
  icon: 'error',
  title: 'Already Loggedin',
  text: 'in Other Device',
})
</script>
	<?php
}
?>
</body>
</html>