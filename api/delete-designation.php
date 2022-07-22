<?php 
include('../config/webconfig.php'); 
$sql = "select * from   16_admin_token"; 
$result = mysqli_query($conn,$sql); 
$data=mysqli_fetch_array($result); 
$status=$data['status'];

if($status==1)
{

$id = $_GET['id']; 

 $sql ="delete from  06_designation_management  where id='".$id."'"; 
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