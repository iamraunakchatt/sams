<?php 
include('../config/webconfig.php'); 

$token=$_POST['token'];
$sql = "SELECT * FROM  16_admin_token  WHERE token='$token'"; 
$result = mysqli_query($conn,$sql); 
$data=mysqli_fetch_array($result); 
$count=mysqli_num_rows($result);
if($count==1)
{

$sql=mysqli_query($conn,"select * from   08_deative_reason_management")or die(mysqli_error($con));

if(mysqli_num_rows($sql)>0){

    $output=mysqli_fetch_all($sql,MYSQLI_ASSOC);
    echo json_encode($output);
}
else{
    echo json_encode(array('message'=>'No Record Found'));
   }

}
else
{
    echo json_encode(array('message'=>'Unauthenticated'));
}
?>