<?php
session_start();
require('../config/webconfig.php');
if(isset($_SESSION['SAMSSuperadminLogin'])){

}else{
    header("location: login.php");
}
$activePage = basename($_SERVER['PHP_SELF'], ".php");
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
<title>Super Admin | SMART ATTENDANCE MARKING SYSTEMS</title>

<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

<link rel="stylesheet" href="assets/css/bootstrap.min.css">

<link rel="stylesheet" href="assets/css/font-awesome.min.css">

<link rel="stylesheet" href="assets/css/line-awesome.min.css">

<link rel="stylesheet" href="assets/css/select2.min.css">

<link rel="stylesheet" href="assets/css/style.css">

<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
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
<h3>SMART ATTENDANCE MARKING SYSTEMS</h3>
</div>

<a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>

<ul class="nav user-menu">

<li class="nav-item dropdown has-arrow main-drop">
<a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
<span class="user-img"><img src="assets/img/profiles/avatar-21.jpg" alt="">
<span class="status online"></span></span>
<span>Admin</span>
</a>
<div class="dropdown-menu">
<a class="dropdown-item" href="index.php">Settings</a>
<a class="dropdown-item" href="logout.php">Logout</a>
</div>
</li>
</ul>


<div class="dropdown mobile-user-menu">
<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
<div class="dropdown-menu dropdown-menu-right">
<a class="dropdown-item" href="index.php">Settings</a>
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

</ul>
</div>
</div>
</div>