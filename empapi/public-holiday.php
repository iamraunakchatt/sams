<?php 
include('../config/webconfig.php'); 

$sql=mysqli_query($conn,"select * from    09_public_holiday_ocassion")or die(mysqli_error($con));

if(mysqli_num_rows($sql)>0){

    $output=mysqli_fetch_all($sql,MYSQLI_ASSOC);
    echo json_encode($output);
}
else{
    echo json_encode(array('message'=>'No Record Found'));
   }
?>