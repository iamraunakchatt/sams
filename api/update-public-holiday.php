
<?php 
  include('../config/webconfig.php');

$id=$_GET['id'];
$date=$_POST['date'];
$ocassion=$_POST['ocassion'];
$sql ="UPDATE 09_public_holiday_ocassion SET datee='".$date."',ocassion='".$ocassion."' where id='".$id."'"; 
if(mysqli_query($conn, $sql)){

  echo json_encode(array('message'=>'Data Update successfully'));
     
} 
else
{
  echo json_encode(array('message'=>'Data not Update'));
}

?>


















