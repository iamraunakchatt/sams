<?php
include('include/header.php'); 
$id = $_GET['id'];
include('../config/webconfig.php');


$sql = "select * from   13_employee where id='".$id."'"; 
$result = mysqli_query($conn,$sql); 
  
$data=mysqli_fetch_array($result); 
$employee_name=$data['employee_name'];
$mobile_no=$data['mobile_no'];
$img=$data['emp_image'];
$email_address=$data['email_address'];
$dob=$data['dob'];
$employee_address_one=$data['employee_address_one'];
$employee_address_two=$data['employee_address_two'];
$city=$data['city'];
$pincode=$data['pincode'];
$sid=$data['shift_id'];
$depid=$data['department_id'];
$desid=$data['designation_id'];

$attendance=$data['attendance'];
$passwordd=$data['passwordd'];




$sql = "select * from   11_shift_management where id='".$sid."'"; 
$result = mysqli_query($conn,$sql); 
  
$data=mysqli_fetch_array($result); 
$shift=$data['shift_name'];


$sql = "select * from   04_department_management where id='".$depid."'"; 
$result = mysqli_query($conn,$sql); 
  
$data=mysqli_fetch_array($result); 
$departmenet_name=$data['departmenet_name'];


$sql = "select * from  06_designation_management where id='".$desid."'"; 
$result = mysqli_query($conn,$sql); 
  
$data=mysqli_fetch_array($result); 
$designation_name=$data['designation_name'];

?>


<div class="page-wrapper">
<div class="content container-fluid">

<div class="page-header">
<div class="row">
<div class="col">
<h3 class="page-title"></h3>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Employee Management</li>
</ul>
</div>
</div>
</div>
<div class="row mb-4">
        <div class="col-md-10">
        </div>
        <div class="col-md-2 float-left">
        <a href="employee.php" class="btn btn-primary " style="width: 100%;margin-top: 5%;">Back</a>

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
<a href="#"><img alt="" src="userimg/<?php echo $img; ?>"></a>
</div>
</div>
<div class="profile-basic">
<div class="row">
<div class="col-md-5">
<div class="profile-info-left">
<h3 class="user-name m-t-0 mb-0"><?php echo $employee_name; ?></h3>
<h6 class="text-muted"><?php echo $departmenet_name; ?></h6>
<small class="text-muted"><?php echo $designation_name; ?></small>
<div class="staff-id">Employee ID : <?php echo $id?></div>
<div class="staff-msg"><a class="btn btn-custom" href="edit-employee.php?id=<?php echo $id; ?>">Edit Profile</a></div>
</div>
</div>
<div class="col-md-7">
<ul class="personal-info">
<li>
<div class="title">Phone:</div>
<div class="text"><?php echo $mobile_no?></div>
</li>
<li>
<div class="title">Email:</div>
<div class="text"><?php echo $email_address?></div>
</li>
<li>
<div class="title">Birthday:</div>
<div class="text"><?php echo $dob?></div>
</li>
<li>
<div class="title">Address:</div>
<div class="text"><?php echo $employee_address_one ?></div>
</li>
</ul>
</div>
</div>
</div>
<!--<div class="pro-edit"><a  class="edit-icon" href="edit-employee.php?id=<?php echo $id; ?>"><i class="fa fa-pencil"></i></a></div>-->
</div>
</div>
</div>
</div>
</div>


<div class="row" style="margin-top:20px">
<div class="col-md-6 d-flex">
<div class="card profile-box flex-fill">
<div class="card-body">
<h3 class="card-title">Address Informations <!--<a href="edit-employee.php?id=<?php echo $id; ?>" class="edit-icon" ><i class="fa fa-pencil"></i></a>--></h3>
<ul class="personal-info">
<li>
<div class="title">Address 1</div>
<div class="text"><?php echo $employee_address_one;?></div>
</li>
<li>
<div class="title">Address 2</div>
<div class="text"><?php echo $employee_address_two;?></div>
</li>
<li>
<div class="title">City</div>
<div class="text"><?php echo $city;?></div>
</li>
<li>
<div class="title">Pin Code</div>
<div class="text"><?php echo $pincode; ?></div>
</li>
</ul>
</div>
</div>
</div>

<div class="col-md-6 d-flex">
<div class="card profile-box flex-fill">
<div class="card-body">
<h3 class="card-title">Other information <!--<a href="edit-employee.php?id=<?php echo $id; ?>" class="edit-icon" ><i class="fa fa-pencil"></i></a>--></h3>
<h5 class="section-title">Office</h5>
<ul class="personal-info">
<li>
<div class="title">Shift Type</div>
<div class="text"><?php echo $shift; ?></div>
<?php
        $statement = $connection->prepare(
          "SELECT * FROM 03_admin_tbl ORDER BY id DESC LIMIT 1"
           );
           $statement->execute();
           $result = $statement->fetchAll();
           foreach($result as $row)
           {
            ?>
            
            <div class="title">Attendance Type</div>
<div class="text"><?php echo ucwords(str_replace(',',', ',($row["atype"]))); ?></div>

<?php
           }
           ?>
</li>
<!--<li>
<div class="title">Attandence Type</div>
<div class="text"><?php echo $attendance; ?></div>
</li>-->

</ul>
<hr>
<h5 class="section-title">Account</h5>
<ul class="personal-info">
<li>
<div class="title">Password</div>
<div class="text"><?php echo $passwordd?></div>
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