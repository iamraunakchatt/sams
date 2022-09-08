<?php 
include('../config/webconfig.php'); 


if (isset($_POST['sender_id']))
{
    $sender_id=stripslashes(mysqli_real_escape_string($conn,$_POST['sender_id']));
    $title=stripslashes(mysqli_real_escape_string($conn,$_POST['title']));
    $message=stripslashes(mysqli_real_escape_string($conn,$_POST['message']));
    $date=stripslashes(mysqli_real_escape_string($conn,$_POST['date']));
    $employee_id=stripslashes(mysqli_real_escape_string($conn,$_POST['employee_id']));

     

   $sql = "INSERT INTO   18_broadcast(sender_id,title,message,date,employee_id) VALUES ('$sender_id','$title','$message','$date','$employee_id')";
           
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