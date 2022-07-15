<?php
include('include/header.php'); 
$id = $_GET['id'];
include('../config/webconfig.php');

$sql="SELECT b.branch_type, b.branch_name, b.city,b.address_1,b.address_2, b.pincode,b.contact_no,b.id,u.user_type,b.attendance_type,b.latitude,b.longtitude,b.radius_meter FROM `12_branch_management` AS b INNER JOIN `10_user_type` AS u ON b.user_type = u.id WHERE b.id='".$id."'"; 
  
// $sql = "select * from 04_department_management where id='".$id."'"; 
$result = mysqli_query($conn,$sql); 
$data=mysqli_fetch_array($result); 
$vbranch=$data['branch_type'];
$vbranch_name=$data['branch_name'];
$vaddress_1=$data['address_1'];
$vaddress_2=$data['address_2'];
$vcity=$data['city'];
$vpincode=$data['pincode'];
$vcontact_no=$data['contact_no'];
$vuser_type=$data['user_type'];
$vattendance_type=$data['attendance_type'];
$vlatitude=$data['latitude'];
$vlongtitude=$data['longtitude'];
$vradius_meter=$data['radius_meter'];
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
<div class="table">
<div class="row">
    <div class="col-md-4">
        <label>Branch Type</label>
        <div class="">
         <?php echo $vbranch; ?>
        </div>
    </div>
    <div class="col-md-4">
        <label>Branch Name</label>
        <div class="">
         <?php echo $vbranch_name; ?>
        </div>
    </div>
    <div class="col-md-4">
        <label>Address1</label>
        <div class="">
         <?php echo $vaddress_1; ?>
        </div>
    </div>
    

    <div class="col-md-4">
        <label>Address2</label>
        <div class="">
         <?php echo $vaddress_1; ?>
        </div>
    </div>

    <div class="col-md-4">
        <label>City</label>
        <div class="">
         <?php echo $vcity; ?>
        </div>
    </div>

    <div class="col-md-4">
        <label>Pincode</label>
        <div class="">
         <?php echo $vpincode; ?>
        </div>
    </div>

    <div class="col-md-4">
        <label>Contact Number</label>
        <div class="">
         <?php echo $vcontact_no; ?>
        </div>
    </div>
    <div class="col-md-4">
        <label>User Type</label>
        <div class="">
         <?php echo $vuser_type; ?>
        </div>
    </div>
    <div class="col-md-4">
        <label>Attendance Type</label>
        <div class="">
         <?php echo $vattendance_type; ?>
        </div>
    </div>
    <div class="col-md-4">
        <label>Latitudes</label>
        <div class="">
         <?php echo $vlatitude; ?>
        </div>
    </div>
    <div class="col-md-4">
        <label>Longitude</label>
        <div class="">
         <?php echo $vlongtitude; ?>
        </div>
    </div>
    <div class="col-md-4">
        <label>Radius in Meter</label>
        <div class="">
         <?php echo $vradius_meter; ?>
        </div>
    </div>


</div>

</div>
</div>
</div>
</div>
</div>
</div>
</div>

</div>


<?php include('include/footer.php'); ?>>