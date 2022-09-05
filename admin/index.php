<?php include('include/header.php');

include('../config/webconfig.php');

  $sql = "SELECT * from 13_employee";

if ($result = mysqli_query($conn, $sql)) {

    // Return the number of rows in result set
    $rowcount = mysqli_num_rows( $result );
    
   
 }

?>
<style type="text/css">

/* .style1 {color: #990000}
.style2 {color: #0033CC} */

</style>



<div class="page-wrapper">

<div class="content container-fluid">

<div class="page-header">
<div class="row">
<div class="col-sm-12">
<h3 class="page-title style1">Welcome Admin!</h3>
<ul class="breadcrumb">
<li class="breadcrumb-item active style2">Dashboard</li>
</ul>
</div>
</div>
</div>

<div class="row">
<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
<div class="card dash-widget">
<div class="card-body">
<span class="dash-widget-icon"><i class="fa fa-users"></i></span>
<div class="dash-widget-info">
<h3><?php echo $rowcount;?></h3>
<span>Total Employees</span>
</div>
</div>
</div>
</div>
<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
<div class="card dash-widget">
<div class="card-body">
<span class="dash-widget-icon"><i class="fa fa-users"></i></span>
<div class="dash-widget-info">
<h3>0</h3>
<span>Present Employees</span>
</div>
</div>
</div>
</div>
<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
<div class="card dash-widget">
<div class="card-body">
<span class="dash-widget-icon"><i class="fa fa-users"></i></span>
<div class="dash-widget-info">
<h3>0</h3>
<span>Absent Employees</span>
</div>
</div>
</div>
</div>
<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
<div class="card dash-widget">
<div class="card-body">
<span class="dash-widget-icon"><i class="fa fa-users"></i></span>
<div class="dash-widget-info">
<h3>0</h3>
<span>Late Employees</span>
</div>
</div>
</div>
</div>
</div>


<div class="row">
<div class="col-md-12 d-flex">
<div class="card card-table flex-fill">
<div class="card-header">
<h3 class="card-title mb-0 style2">Employee Attendance</h3>
</div>
<div class="card-body">
<div class="table-responsive">
<table class="table custom-table mb-0">
<thead>
<tr>
<th>Time Date</th>
<th>Name</th>
<th class="text-end">Branch</th>
</tr>
</thead>
<tbody>
<tr>
<td>
02/06/2022  9:05:00 AM  In
</td>
<td>
<h2 class="table-avatar">
<a href="#" class="avatar"><img alt="" src="../admin - Copy/assets/img/profiles/avatar-19.jpg"></a>
<a href="../admin - Copy/client-profile.html">Barry Cuda <span>CEO</span></a>
</h2>
</td>
<td class="text-end">
Mumbai Branch
</td>
</tr>
<tr>
<td>
02/06/2022  9:06:00 PM  Out
</td>
<td>
<h2 class="table-avatar">
<a href="#" class="avatar"><img alt="" src="../admin - Copy/assets/img/profiles/avatar-18.jpg"></a>
<a href="../admin - Copy/client-profile.html">Larry Kim <span>Manager</span></a>
</h2>
</td>
<td class="text-end">
Delhi Branch
</td>
</tr>
</tbody>
</table>
</div>
</div>
<div class="card-footer">
<a href="../admin - Copy/employee.php">View all Employee Details</a>
</div>
</div>
</div>




</div>
</div>

</div>

</div>


<script src="../admin - Copy/assets/js/jquery-3.6.0.min.js"></script>

<script src="../admin - Copy/assets/js/bootstrap.bundle.min.js"></script>

<script src="../admin - Copy/assets/js/jquery.slimscroll.min.js"></script>

<script src="../admin - Copy/assets/js/jquery.dataTables.min.js"></script>
<script src="../admin - Copy/assets/js/dataTables.bootstrap4.min.js"></script>

<script src="../admin - Copy/assets/js/app.js"></script>
</body>
</html>