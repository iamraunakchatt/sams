<?php 
include('../config/webconfig.php'); 

$empid=$_GET['empid'];
$sql=mysqli_query($conn,"select * from 20_live_tracking where emp_id='".$empid."' order by id DESC LIMIT 1")or die(mysqli_error($con));

if(mysqli_num_rows($sql)>0){

    $output=mysqli_fetch_all($sql,MYSQLI_ASSOC);
    echo json_encode($output);
}
else
{
    echo json_encode(array('message'=>'No Record Found'));
}
?>