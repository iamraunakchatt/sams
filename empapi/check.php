<?php
$emp_id=2;
$date='22/9/2022';
include('../config/webconfig.php'); 
    $sql1=mysqli_query($conn,"select * from  21_attendance_type where employee_id='".$emp_id."' AND date='$date' ORDER by id DESC Limit 1")or die(mysqli_error($con));

if(mysqli_num_rows($sql1)>0){
    
    $output=mysqli_fetch_all($sql1,MYSQLI_ASSOC);
    echo $output[0]['attendance_type'];
    
}else{
    $attendance_type='IN';
    
}

?>