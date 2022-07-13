<?php
include('include/header.php'); 
$id = $_GET['id'];
include('../config/webconfig.php');

$sql = "select * from   11_shift_management where id='".$id."'"; 
$result = mysqli_query($conn,$sql); 
  
$data=mysqli_fetch_array($result); 
$shift_name=$data['shift_name'];
$from_shift=$data['from_shift'];
$to_from=$data['to_from'];
$lunch=$data['lunch'];
$to_lunch=$data['to_lunch'];
$grace_period=$data['grace_period'];
?>


<div class="page-wrapper">
<div class="content container-fluid">

<div class="page-header">
<div class="row">
<div class="col">
<h3 class="page-title"></h3>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="#">Home</a></li>

<li class="breadcrumb-item active">Shift Management</li>
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
        <label>Shift Name</label>
        <div class="">
         <?php echo $shift_name; ?>
        </div>
    </div>
    <div class="col-md-4">
        <label>From</label>
        <div class="">
         <?php echo $from_shift; ?>
        </div>
    </div>
    <div class="col-md-4">
        <label>To</label>
        <div class="">
         <?php echo $to_from; ?>
        </div>
    </div>
    

    <div class="col-md-4">
        <label>Lunch</label>
        <div class="">
         <?php echo $lunch; ?>
        </div>
    </div>

    <div class="col-md-4">
        <label>To Lunch</label>
        <div class="">
         <?php echo $to_lunch; ?>
        </div>
    </div>

    <div class="col-md-4">
        <label>Grace Period</label>
        <div class="">
         <?php echo $grace_period; ?> Minutes
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