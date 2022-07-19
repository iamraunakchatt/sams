<?php 
  include('../config/webconfig.php');

$id=$_GET['id'];
$employee_name=$_POST['employee_name'];
$sql ="UPDATE   05_employee_management SET employee_name='".$employee_name."' where id='".$id."'"; 
if(mysqli_query($conn, $sql)){

  echo json_encode(array('message'=>'Data Update successfully'));
     
} 
else
{
  echo json_encode(array('message'=>'Data not Update'));
}

?>