<?php 
  include('../config/webconfig.php');

$id=$_GET['id'];
$deparment_name=$_POST['deparment_name'];
$sql ="UPDATE  04_department_management SET departmenet_name='".$deparment_name."' where id='".$id."'"; 
if(mysqli_query($conn, $sql)){

  echo json_encode(array('message'=>'Data Update successfully'));
     
} 
else
{
  echo json_encode(array('message'=>'Data not Update'));
}

?>