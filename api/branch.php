<?php 
include('../config/webconfig.php'); 

$sql=mysqli_query($conn,"SELECT b.branch_type, b.branch_name, b.city, b.pincode,b.contact_no,b.id FROM `12_branch_management` AS b INNER JOIN `10_user_type` AS u ON b.user_type = u.id;")or die(mysqli_error($con));

if(mysqli_num_rows($sql)>0){

    $output=mysqli_fetch_all($sql,MYSQLI_ASSOC);
    echo json_encode($output);
}
else{
    echo json_encode(array('message'=>'No Record Found'));
   }
?>