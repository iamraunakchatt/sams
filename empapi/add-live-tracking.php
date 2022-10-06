<?php 
include('../config/webconfig.php'); 


if (isset($_POST['emp_id']))
{
    $date=stripslashes(mysqli_real_escape_string($conn,$_POST['date']));
    $emp_id=stripslashes(mysqli_real_escape_string($conn,$_POST['emp_id']));
    $latitude=stripslashes(mysqli_real_escape_string($conn,$_POST['latitude']));
    $longitude=stripslashes(mysqli_real_escape_string($conn,$_POST['longitude']));
  
   $sql = "INSERT INTO  20_live_tracking(date,emp_id,latitude,longitude) VALUES ('$date','$emp_id','$latitude','$longitude')";
           
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