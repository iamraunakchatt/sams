<?php 
include('../config/webconfig.php'); 

$emp_id=$_GET['emp_id'];
$atten_date=$_GET['atten_date'];
$sql=mysqli_query($conn,"select * from  21_attendance_type where employee_id='".$emp_id."' AND date='".$atten_date."'")or die(mysqli_error($con));

if(mysqli_num_rows($sql)>0){

    $output=mysqli_fetch_all($sql,MYSQLI_ASSOC);
    

    echo json_encode($output);
    
    
}
else
{
    echo json_encode(array('message'=>'No Record Found'));
}
?>