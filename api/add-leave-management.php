<?php  
  include('../config/webconfig.php');
 
if (isset($_POST['leave']))
{
    $name=stripslashes(mysqli_real_escape_string($conn,$_POST['leave']));
   
    $sql = "INSERT INTO  07_leave_management(leave_data) VALUES ('$name')";
         
if(mysqli_query($conn, $sql)){
        echo json_encode(array('message'=>'Data Insert successfully'));
           
} else
{
        echo json_encode(array('message'=>'Data not Insert'));
}
     
}
else
{
echo json_encode(array('message'=>'Data not Insert'));
}
?>