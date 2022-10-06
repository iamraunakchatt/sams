<?php 
include('../config/webconfig.php'); 

$fromdate=$_GET['fromdate'];
$todate=$_GET['todate'];
$empid=$_GET['empid'];




$sql=mysqli_query($conn,"SELECT count(DISTINCT(date)) AS presentday FROM `21_attendance_type` where date between '$fromdate' and '$todate' AND employee_id=$empid")or die(mysqli_error($con));
if(mysqli_num_rows($sql)>0){

    $output=mysqli_fetch_all($sql,MYSQLI_ASSOC);
    $presentday= $output[0]['presentday'];
    
    
    
   echo '[
  {
    "presentday": "'.$presentday.'"
  }
]';
}
else
{
    echo json_encode(array('message'=>'No Record Found'));
}
?>