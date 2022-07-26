<?php 
include('../config/webconfig.php'); 


$token=$_POST['token'];
$sql = "SELECT * FROM  16_admin_token  WHERE token='$token'"; 
$result = mysqli_query($conn,$sql); 
$data=mysqli_fetch_array($result); 
$count=mysqli_num_rows($result);
if($count==1)
{

if (isset($_POST['deactive_reason']))
{
    $name=stripslashes(mysqli_real_escape_string($conn,$_POST['deactive_reason']));
    
    $sql = "INSERT INTO  08_deative_reason_management(deactive_reason) VALUES ('$name')";
           
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
}
else
{
    echo json_encode(array('message'=>'Unauthenticated'));
}

?>