<?php
session_start();
require('check_token.php');
require('../config/webconfig.php');
if(isset($_SESSION['SAMSSuperadminLogin'])){

}else{
    header("location: login.php");
}
$activePage = basename($_SERVER['PHP_SELF'], ".php");

$statement1 = $connection->prepare(
	"SELECT * FROM 01_superadmin_tbl ORDER BY id DESC LIMIT 1"
   );
   $statement1->execute();
   $result1 = $statement1->fetchAll();
   foreach($result1 as $row1)
   {
	$propic=$row1["propic"];
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
<title>SAMS - Superadmin</title>

<link rel="shortcut icon" type="image/x-icon" href="assets/img/logo2.png">

<link rel="stylesheet" href="assets/css/bootstrap.min.css">

<link rel="stylesheet" href="assets/css/font-awesome.min.css">

<link rel="stylesheet" href="assets/css/line-awesome.min.css">

<link rel="stylesheet" href="assets/css/select2.min.css">

<link rel="stylesheet" href="assets/css/style.css">

<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
      <style>
         #toggle-password1,#toggle-password2,#toggle-password3,#toggle-password4 {
    cursor: pointer;
    margin-right: 1px;
    position: absolute;
    top: 35px;
    right: 10px;
}
      </style>
</head>
<body>

<div class="main-wrapper">

<div class="header">

<div class="header-left">
<a href="admin-dashboard.html" class="logo">
<img src="assets/img/logo2.png" width="40" height="40" alt="">
</a>
</div>

<a id="toggle_btn" href="javascript:void(0);">
<span class="bar-icon">
<span></span>
<span></span>
<span></span>
</span>
</a>

<div class="page-title-box">
<h3>SMART ATTENDANCE  MANAGEMENT SYSTEM</h3>
</div>

<a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>

<ul class="nav user-menu">

<li class="nav-item dropdown has-arrow main-drop">
<a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
<span class="user-img"><img src="action/logo/<?php echo $propic; ?>" alt="">
<span class="status online"></span></span>
<span>Admin</span>
</a>
<div class="dropdown-menu">
<a class="dropdown-item" href="settings.php">Settings</a>
<a class="dropdown-item" href="logout.php">Logout</a>
</div>
</li>
</ul>


<div class="dropdown mobile-user-menu">
<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
<div class="dropdown-menu dropdown-menu-right">
<a class="dropdown-item" href="settings.php">Settings</a>
<a class="dropdown-item" href="logout.php">Logout</a>
</div>
</div>

</div>


<div class="sidebar" id="sidebar">
<div class="sidebar-inner slimscroll">
<div class="sidebar-menu">
<ul>
<li>
<a href="logout.php"><i class="la la-home"></i> <span>Back to Home</span></a>
</li>
<li class="menu-title">Settings</li>
<li class="<?php if($activePage == 'index'){echo 'active';}else{ echo '';} ?>">
<a href="index.php"><i class="la la-cog"></i> <span>Application Settings</span></a>
</li>
<li class="<?php if($activePage == 'login-history'){echo 'active';}else{ echo '';} ?>">
<a href="login-history.php"><i class="la la-clock-o"></i> <span>Login History</span></a>
</li>
<!-- <li class="<?php if($activePage == 'settings'){echo 'active';}else{ echo '';} ?>">
<a href="settings.php"><i class="la la-lock"></i> <span>Change Password</span></a>
</li> -->

</ul>
</div>
</div>
</div>