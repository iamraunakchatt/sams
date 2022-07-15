<?php include('include/header.php');

include('../config/webconfig.php');

  $sql = "SELECT * from 13_employee";

if ($result = mysqli_query($conn, $sql)) {

    // Return the number of rows in result set
    $rowcount = mysqli_num_rows( $result );
    
   
 }

?>


<div class="page-wrapper">

<div class="content container-fluid">

<div class="page-header">
<div class="row">
<div class="col-sm-12">
<h3 class="page-title">Welcome Admin!</h3>
<ul class="breadcrumb">
<li class="breadcrumb-item active">Dashboard</li>
</ul>
</div>
</div>
</div>

<div class="row">
<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
<div class="card dash-widget">
<div class="card-body">
<span class="dash-widget-icon"><i class="fa fa-cubes"></i></span>
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
<span class="dash-widget-icon"><i class="fa fa-usd"></i></span>
<div class="dash-widget-info">
<h3>44</h3>
<span>Present Employees</span>
</div>
</div>
</div>
</div>
<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
<div class="card dash-widget">
<div class="card-body">
<span class="dash-widget-icon"><i class="fa fa-diamond"></i></span>
<div class="dash-widget-info">
<h3>37</h3>
<span>Absent Employees</span>
</div>
</div>
</div>
</div>
<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
<div class="card dash-widget">
<div class="card-body">
<span class="dash-widget-icon"><i class="fa fa-user"></i></span>
<div class="dash-widget-info">
<h3>218</h3>
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
<h3 class="card-title mb-0">Clients</h3>
</div>
<div class="card-body">
<div class="table-responsive">
<table class="table custom-table mb-0">
<thead>
<tr>
<th>Name</th>
<th>Email</th>
<th>Status</th>
<th class="text-end">Action</th>
</tr>
</thead>
<tbody>
<tr>
<td>
<h2 class="table-avatar">
<a href="#" class="avatar"><img alt="" src="assets/img/profiles/avatar-19.jpg"></a>
<a href="client-profile.html">Barry Cuda <span>CEO</span></a>
</h2>
</td>
<td><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="cfadaebdbdb6acbaabae8faab7aea2bfa3aae1aca0a2">[email&#160;protected]</a></td>
<td>
<div class="dropdown action-label">
<a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
<i class="fa fa-dot-circle-o text-success"></i> Active
</a>
<div class="dropdown-menu dropdown-menu-right">
<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i> Active</a>
<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Inactive</a>
</div>
</div>
</td>
<td class="text-end">
<div class="dropdown dropdown-action">
<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
<div class="dropdown-menu dropdown-menu-right">
<a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-pencil m-r-5"></i> Edit</a>
<a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
</div>
</div>
</td>
</tr>
<tr>
<td>
<h2 class="table-avatar">
<a href="#" class="avatar"><img alt="" src="assets/img/profiles/avatar-19.jpg"></a>
<a href="client-profile.html">Tressa Wexler <span>Manager</span></a>
</h2>
</td>
<td><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="d0a4a2b5a3a3b1a7b5a8bcb5a290b5a8b1bda0bcb5feb3bfbd">[email&#160;protected]</a></td>
<td>
<div class="dropdown action-label">
<a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
<i class="fa fa-dot-circle-o text-danger"></i> Inactive
</a>
<div class="dropdown-menu dropdown-menu-right">
<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i> Active</a>
<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Inactive</a>
</div>
</div>
</td>
<td class="text-end">
<div class="dropdown dropdown-action">
<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
<div class="dropdown-menu dropdown-menu-right">
<a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-pencil m-r-5"></i> Edit</a>
<a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
</div>
</div>
</td>
</tr>
<tr>
<td>
<h2 class="table-avatar">
<a href="client-profile.html" class="avatar"><img alt="" src="assets/img/profiles/avatar-07.jpg"></a>
<a href="client-profile.html">Ruby Bartlett <span>CEO</span></a>
</h2>
</td>
<td><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="d3a1a6b1aab1b2a1a7bfb6a7a793b6abb2bea3bfb6fdb0bcbe">[email&#160;protected]</a></td>
<td>
<div class="dropdown action-label">
<a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
<i class="fa fa-dot-circle-o text-danger"></i> Inactive
</a>
<div class="dropdown-menu dropdown-menu-right">
<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i> Active</a>
<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Inactive</a>
</div>
</div>
</td>
<td class="text-end">
<div class="dropdown dropdown-action">
<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
<div class="dropdown-menu dropdown-menu-right">
<a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-pencil m-r-5"></i> Edit</a>
<a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
</div>
</div>
</td>
</tr>
<tr>
<td>
<h2 class="table-avatar">
<a href="client-profile.html" class="avatar"><img alt="" src="assets/img/profiles/avatar-06.jpg"></a>
<a href="client-profile.html"> Misty Tison <span>CEO</span></a>
</h2>
</td>
<td><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="6a0703191e131e031905042a0f120b071a060f44090507">[email&#160;protected]</a></td>
<td>
<div class="dropdown action-label">
<a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
<i class="fa fa-dot-circle-o text-success"></i> Active
</a>
<div class="dropdown-menu dropdown-menu-right">
<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i> Active</a>
<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Inactive</a>
</div>
</div>
</td>
<td class="text-end">
<div class="dropdown dropdown-action">
<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
<div class="dropdown-menu dropdown-menu-right">
<a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-pencil m-r-5"></i> Edit</a>
<a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
</div>
</div>
</td>
</tr>
<tr>
<td>
<h2 class="table-avatar">
<a href="client-profile.html" class="avatar"><img alt="" src="assets/img/profiles/avatar-14.jpg"></a>
<a href="client-profile.html"> Daniel Deacon <span>CEO</span></a>
</h2>
</td>
<td><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="cbafaaa5a2aea7afaeaaa8a4a58baeb3aaa6bba7aee5a8a4a6">[email&#160;protected]</a></td>
<td>
<div class="dropdown action-label">
<a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
<i class="fa fa-dot-circle-o text-danger"></i> Inactive
</a>
<div class="dropdown-menu dropdown-menu-right">
<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i> Active</a>
<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Inactive</a>
</div>
</div>
</td>
<td class="text-end">
<div class="dropdown dropdown-action">
<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
<div class="dropdown-menu dropdown-menu-right">
<a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-pencil m-r-5"></i> Edit</a>
<a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
</div>
</div>
</td>
</tr>
</tbody>
</table>
</div>
</div>
<div class="card-footer">
<a href="clients.html">View all clients</a>
</div>
</div>
</div>




</div>
</div>

</div>

</div>


<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="assets/js/jquery.slimscroll.min.js"></script>

<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/dataTables.bootstrap4.min.js"></script>

<script src="assets/js/app.js"></script>
</body>
</html>