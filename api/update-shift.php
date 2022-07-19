
<?php 
  include('../config/webconfig.php');

$id=$_GET['id'];
$shift_name=$_POST['shift_name'];
$from=$_POST['from'];
$to_from=$_POST['to_from'];
$lunch=$_POST['lunch'];
$to_lunch=$_POST['to_lunch'];
$grace_period=$_POST['grace_period'];
$sql ="UPDATE  11_shift_management SET shift_name='".$shift_name."',from_shift='".$from."',to_from='".$to_from."',lunch='".$lunch."',to_lunch='".$to_lunch."',grace_period='".$grace_period."' where id='".$id."'"; 
   

if(mysqli_query($conn, $sql)){

  echo json_encode(array('message'=>'Data Update successfully'));
     
} 
else
{
  echo json_encode(array('message'=>'Data not Update'));
}

?>


















