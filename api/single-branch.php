<?php 
include('../config/webconfig.php'); 

$id=$_GET['id'];

$sql="SELECT b.branch_type, b.branch_name, b.city,b.address_1,b.address_2, b.pincode,b.contact_no,b.id,u.user_type,b.attendance_type,b.latitude,b.longtitude,b.radius_meter FROM `12_branch_management` AS b INNER JOIN `10_user_type` AS u ON b.user_type = u.id WHERE b.id='".$id."'"; 
$result = mysqli_query($conn,$sql); 
  

if(mysqli_num_rows($result)>0){

    $output=mysqli_fetch_all($result,MYSQLI_ASSOC);
    echo json_encode($output);
}
else
   {
    echo json_encode(array('message'=>'No Record Found'));
   }

?>