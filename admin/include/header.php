<?php
ob_start();
@session_start();
require('../config/webconfig.php');
if(isset($_SESSION['SAMSAdminLogin'])){

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
<title>SAMS - Admin</title>

<link rel="shortcut icon" type="image/x-icon" href="assets/img/logo2.png">

<link rel="stylesheet" href="assets/css/bootstrap.min.css">

<link rel="stylesheet" href="assets/css/font-awesome.min.css">

<link rel="stylesheet" href="assets/css/line-awesome.min.css">

<link rel="stylesheet" href="assets/css/select2.min.css">

<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
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
<?php
	 $statement = $connection->prepare(
		"SELECT * FROM 03_admin_tbl ORDER BY id DESC LIMIT 1"
	   );
	   $statement->execute();
	   $result = $statement->fetchAll();
	   foreach($result as $row)
	   {
		?>
<a href="index.php" class="logo">
<img src="../sadmin/action/logo/<?php echo $row["logo"]; ?>" width="100" height="100" alt="">
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
<h3><?php echo $row["cname"]; ?></h3>
</div>

<a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>

<ul class="nav user-menu">

<li class="nav-item dropdown has-arrow main-drop">
<a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
<span class="user-img"><img src="<?php echo $row['profilepic']; ?>" alt="">
<span class="status online"></span></span>
<span>Admin</span>
</a>
<div class="dropdown-menu">
<a class="dropdown-item" href="setting.php">Settings</a>
<a class="dropdown-item" href="logout.php">Logout</a>
</div>
</li>
</ul>
<?php
	   }
	   ?>

<div class="dropdown mobile-user-menu">
<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
<div class="dropdown-menu dropdown-menu-right">
<a class="dropdown-item" href="#">Settings</a>
<a class="dropdown-item" href="logout.php">Logout</a>
</div>
</div>

</div>


<div class="sidebar" id="sidebar">
<div class="sidebar-inner slimscroll">
<div class="sidebar-menu">
<ul>
<li>
<a href="index.php"><i class="la la-home"></i> <span>Back to Home</span></a>
<a href="office.php"><i class="la la-building"></i> <span>Office Details</span></a>
</li>
<li class="menu-title">Management</li>
<!-- <li class="">
<a href="manage.php"><i class="la la-cog"></i> <span>Application Settings</span></a>
</li>
<li class="">
<a href="#"><i class="la la-clock-o"></i> <span>Login History</span></a>
</li> -->
<li class="<?php if($activePage == 'department-management'){echo 'active';}else{ echo '';} ?>">
<a href="department-management.php"><i class="la la-cubes"></i> <span>Manage Department</span></a>
</li>

<li class="<?php if($activePage == 'designation-managment'){echo 'active';}else{ echo '';} ?>">
<a href="designation-managment.php"><i class="la la-drivers-license-o"></i> <span>Manage Designation </span></a>
</li>
<li class="<?php if($activePage == 'employee-type-managment'){echo 'active';}else{ echo '';} ?>">
<a href="employee-type-managment.php"><i class="la la-id-badge"></i> <span>Manage Employee Type </span></a>
</li>
<li class="<?php if($activePage == 'leave-management'){echo 'active';}else{ echo '';} ?>">
<a href="leave-management.php"><i class="la la-thermometer"></i> <span>Manage Leave Type </span></a>
</li>
<li class="<?php if($activePage == 'deactive-reason'){echo 'active';}else{ echo '';} ?>">
<a href="deactive-reason.php"><i class="la la-info-circle"></i> <span>Deactive Reason </span></a>
</li>

<li class="<?php if($activePage == 'public-holiday-managment'){echo 'active';}else{ echo '';} ?>">
<a href="public-holiday-managment.php"><i class="la la-calendar"></i> <span>Public Holiday Occasion </span></a>
</li>

<li class="<?php if($activePage == 'user-type'){echo 'active';}else{ echo '';} ?>">
<a href="user-type.php"><i class="la la-briefcase"></i> <span>Manage User Type</span></a>
</li>

<li class="<?php if($activePage == 'shift-managment'){echo 'active';}else{ echo '';} ?>">
<a href="shift-managment.php"><i class="la la-clock-o"></i> <span>Manage Shift</span></a>
</li>
<li class="<?php if($activePage == 'branch-type'){echo 'active';}else{ echo '';} ?>">
<a href="branch-type.php"><i class="la la-sitemap"></i> <span>Branch Type</span></a>
</li>
<li class="<?php if($activePage == 'branch-managment'){echo 'active';}else{ echo '';} ?>">
<a href="branch-managment.php"><i class="la la-building"></i> <span>Manage Branch</span></a>
</li>
<li class="<?php if($activePage == 'employee'){echo 'active';}else{ echo '';} ?>">
<a href="employee.php"><i class="la la-users"></i> <span>Manage Employee</span></a>
</li>
<li class="<?php if($activePage == 'manage-leave'){echo 'active';}else{ echo '';} ?>">
<a href="manage-leave.php"><i class="la la-clock-o"></i> <span>Manage Leave</span></a>
</li>

<style>

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: inherit;
  min-width: 100%;
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */

/* Show the dropdown menu (use JS to add this class to the .dropdown-content container when the user clicks on the dropdown button) */
.show {display:block;}
</style>
<style>

/* Dropdown Content (Hidden by Default) */
.dropdown-content1 {
  display: none;
  position: inherit;
  min-width: 100%;
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content1 a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */

/* Show the dropdown menu (use JS to add this class to the .dropdown-content container when the user clicks on the dropdown button) */
.show1 {display:block;}
</style>
<li>
    <div class="dropdown">
  <a onclick="myFunction()" href="#" class="dropbtn"><i class="la la-pie-chart" style="margin-right: 15px;"></i> View Reports <span class="menu-arrow"></span></a>
  <div id="myDropdown" class="dropdown-content">
       <a href="#">Live Tracking</a>
    <a href="#">Daily Performance</a>
    <a href="#">Daily Late Arrival</a>
    <a href="#">Daily Early Depart</a>
    <a href="#">Daily Absent/on Leave</a>
    <a href="#">Monthly Report</a>
    <a href="#">Yearly Report</a>
  </div>
</div>
</li>
<li>
    <div class="dropdown1">
  <a onclick="myFunction1()" href="#" class="dropbtn1"><i class="la la-cog" style="margin-right: 15px;"></i> Tools <span class="menu-arrow"></span></a>
  <div id="myDropdown1" class="dropdown-content1">
       <a href="#">Notes to Employee</a>
    <a href="#">Send Broadcast to Employees</a>
    
  </div>
</div>
</li>
</ul>
</div>
</div>
</div>
<script>
    function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
  document.getElementById("myDropdown1").classList.remove("show1");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var dropdowns1 = document.getElementsByClassName("dropdown-content1");
    dropdowns1.classList.remove('show1');
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
<script>
    function myFunction1() {
  document.getElementById("myDropdown1").classList.toggle("show1");
  document.getElementById("myDropdown").classList.remove("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn1')) {
    var dropdowns = document.getElementsByClassName("dropdown-content1");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show1')) {
        openDropdown.classList.remove('show1');
      }
    }
  }
}
</script>