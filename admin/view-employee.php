<?php
include('include/header.php'); 
$id = $_GET['id'];
include('../config/webconfig.php');

?>


<div class="page-wrapper">
<div class="content container-fluid">

<div class="page-header">
<div class="row">
<div class="col">
<h3 class="page-title"></h3>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Branch Management</li>
</ul>
</div>
</div>
</div>

<div class="row">
<div class="col-sm-12">
<div class="card mb-0">
<div class="card-body">
<div class="row">
<div class="col-md-12">
<div class="profile-view">
<div class="profile-img-wrap">
<div class="profile-img">
<a href="#"><img alt="" src="assets/img/profiles/avatar-02.jpg"></a>
</div>
</div>
<div class="profile-basic">
<div class="row">
<div class="col-md-5">
<div class="profile-info-left">
<h3 class="user-name m-t-0 mb-0">John Doe</h3>
<h6 class="text-muted">UI/UX Design Team</h6>
<small class="text-muted">Web Designer</small>
<div class="staff-id">Employee ID : 0001</div>
<div class="staff-msg"><a class="btn btn-custom" href="#">Edit Profile</a></div>
</div>
</div>
<div class="col-md-7">
<ul class="personal-info">
<li>
<div class="title">Phone:</div>
<div class="text"><a href="">9876543210</a></div>
</li>
<li>
<div class="title">Email:</div>
<div class="text"><a href="">ram@gmail.com</a></div>
</li>
<li>
<div class="title">Birthday:</div>
<div class="text">24th July</div>
</li>
<li>
<div class="title">Address:</div>
<div class="text">1861 Bayonne Ave, Manchester Township, NJ, 08759</div>
</li>
</ul>
</div>
</div>
</div>
<div class="pro-edit"><a  class="edit-icon" href="#"><i class="fa fa-pencil"></i></a></div>
</div>
</div>
</div>
</div>
</div>


<div class="row" style="margin-top:20px">
<div class="col-md-6 d-flex">
<div class="card profile-box flex-fill">
<div class="card-body">
<h3 class="card-title">Address Informations <a href="#" class="edit-icon" ><i class="fa fa-pencil"></i></a></h3>
<ul class="personal-info">
<li>
<div class="title">Address 1</div>
<div class="text">9876543210</div>
</li>
<li>
<div class="title">Address 2</div>
<div class="text">9876543210</div>
</li>
<li>
<div class="title">City</div>
<div class="text">9876543210</div>
</li>
<li>
<div class="title">Pin Code</div>
<div class="text">Indian</div>
</li>
</ul>
</div>
</div>
</div>

<div class="col-md-6 d-flex">
<div class="card profile-box flex-fill">
<div class="card-body">
<h3 class="card-title">Other information <a href="#" class="edit-icon" ><i class="fa fa-pencil"></i></a></h3>
<h5 class="section-title">Office</h5>
<ul class="personal-info">
<li>
<div class="title">Shift Type</div>
<div class="text">John Doe</div>
</li>
<li>
<div class="title">Attandence Type</div>
<div class="text">Father</div>
</li>

</ul>
<hr>
<h5 class="section-title">Account</h5>
<ul class="personal-info">
<li>
<div class="title">Password</div>
<div class="text">Karen Wills</div>
</li>
</ul>
</div>
</div>
</div>



</div>


</div>
</div>
</div>

</div>


<?php include('include/footer.php'); ?>>