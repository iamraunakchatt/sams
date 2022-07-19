<?php 
include('../config/webconfig.php'); 


if (isset($_POST['shift_name']))
{
    $shift_name=stripslashes(mysqli_real_escape_string($conn,$_POST['shift_name']));
    $from=stripslashes(mysqli_real_escape_string($conn,$_POST['from']));
    $to_from=stripslashes(mysqli_real_escape_string($conn,$_POST['to_from']));
    $lunch=stripslashes(mysqli_real_escape_string($conn,$_POST['lunch']));
    $to_lunch=stripslashes(mysqli_real_escape_string($conn,$_POST['to_lunch']));
    $grace_period=stripslashes(mysqli_real_escape_string($conn,$_POST['grace_period']));
   
    $sql = "INSERT INTO   11_shift_management(shift_name,from_shift,to_from,lunch,to_lunch,grace_period) VALUES ('$shift_name','$from','$to_from','$lunch','$to_lunch','$grace_period')";
           
        if(mysqli_query($conn, $sql)){
            echo json_encode(array('message'=>'Data Insert successfully'));
               
        } else{
            echo json_encode(array('message'=>'Data not Insert'));
        }
}
else
{
    echo json_encode(array('message'=>'Data not Insert'));
}

?>