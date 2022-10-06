<?php 
include('../config/webconfig.php'); 


if (isset($_POST['emp_id']))
{
    $from_date=stripslashes(mysqli_real_escape_string($conn,$_POST['from_date']));
    $to_date=stripslashes(mysqli_real_escape_string($conn,$_POST['to_date']));
    $emp_id=stripslashes(mysqli_real_escape_string($conn,$_POST['emp_id']));
    $reason=stripslashes(mysqli_real_escape_string($conn,$_POST['reason']));
    $request_date=stripslashes(mysqli_real_escape_string($conn,$_POST['request_date']));
    $status=0;

     

   $sql = "INSERT INTO  019_leave_request(from_date,to_date,emp_id,reason,status,request_date) VALUES ('$from_date','$to_date','$emp_id','$reason','$status','$request_date')";
           
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