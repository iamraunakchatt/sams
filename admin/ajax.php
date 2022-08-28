<?php 
$conn=mysqli_connect("localhost","ascsamsi_admin","~&BGHA$;Ii?=","ascsamsi_db");
$id = $_GET['id']; 
$anchor_value = $_GET['anchor_value']; 
if($anchor_value=='department')
{
$sql = "select * from 04_department_management where id='".$id."'"; 
$result = mysqli_query($conn,$sql); 
  
$data=mysqli_fetch_array($result); 
echo json_encode($data);
}
elseif($anchor_value=='designation')
{
$sql = "select * from  06_designation_management where id='".$id."'"; 
$result = mysqli_query($conn,$sql); 
  
$data=mysqli_fetch_array($result); 
echo json_encode($data);
}
elseif($anchor_value=='empmanagment')
{
$sql = "select * from  05_employee_management where id='".$id."'"; 
$result = mysqli_query($conn,$sql); 
  
$data=mysqli_fetch_array($result); 
echo json_encode($data);
}

elseif($anchor_value=='leave-management')
{
$sql = "select * from   07_leave_management where id='".$id."'"; 
$result = mysqli_query($conn,$sql); 
  
$data=mysqli_fetch_array($result); 
echo json_encode($data);
}
elseif($anchor_value=='deactive_reason')
{
$sql = "select * from   08_deative_reason_management where id='".$id."'"; 
$result = mysqli_query($conn,$sql); 
  
$data=mysqli_fetch_array($result); 
echo json_encode($data);
}
elseif($anchor_value=='public_holiday')
{
$sql = "select * from   09_public_holiday_ocassion where id='".$id."'"; 
$result = mysqli_query($conn,$sql); 
  
$data=mysqli_fetch_array($result); 
echo json_encode($data);
}
elseif($anchor_value=='user_type')
{
$sql = "select * from   10_user_type where id='".$id."'"; 
$result = mysqli_query($conn,$sql); 
  
$data=mysqli_fetch_array($result); 
echo json_encode($data);
}
elseif($anchor_value=='shift')
{
$sql = "select * from   11_shift_management where id='".$id."'"; 
$result = mysqli_query($conn,$sql); 
  
$data=mysqli_fetch_array($result); 
echo json_encode($data);
}

elseif($anchor_value=='branch-type')
{
$sql = "select * from   15_branch_type_management where id='".$id."'"; 
$result = mysqli_query($conn,$sql); 
  
$data=mysqli_fetch_array($result); 
echo json_encode($data);
}


?>