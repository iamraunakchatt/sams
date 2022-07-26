<?php 

include('../config/webconfig.php'); 

$token=$_POST['token'];
$sql = "SELECT * FROM  16_admin_token  WHERE token='$token'"; 
$result = mysqli_query($conn,$sql); 
$data=mysqli_fetch_array($result); 
$count=mysqli_num_rows($result);
if($count==1)
{

$id = $_GET['id']; 

 $sql ="delete from  09_public_holiday_ocassion  where id='".$id."'"; 
 if(mysqli_query($conn, $sql)){

    echo json_encode(array('message'=>'Data Delete successfully'));
       
} 
else
{
    echo json_encode(array('message'=>'Data not Delete'));
}
}
else
{
    echo json_encode(array('message'=>'Unauthenticated'));
}
?>