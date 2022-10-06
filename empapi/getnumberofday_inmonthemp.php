<?php 
include('../config/webconfig.php'); 

$month=$_GET['month'];

$empid=$_GET['empid'];
$sql=mysqli_query($conn,"SELECT count(DISTINCT(date)) AS presentdate FROM `21_attendance_type` where date LIKE '%/$month/%' AND employee_id=$empid")or die(mysqli_error($con));





if(mysqli_num_rows($sql)>0){

    $output=mysqli_fetch_all($sql,MYSQLI_ASSOC);
    //print_r($output);
   $presentdate= $output[0]['presentdate'];
   
   if($month=="1" || $month=="3" || $month=="5" || $month=="7" || $month=="8" || $month=="10" || $month=="12"){
       $absentday=31-$presentdate;
   }else if($month=="2"){
       $absentday=28-$presentdate;
   }else{
       $absentday=30-$presentdate;
   }
   
   
   
   
    echo '[
  {
    "presentday": "'.$presentdate.'",
    "absentday": "'.$absentday.'"
  }
]';
}
else
{
    echo json_encode(array('message'=>'No Record Found'));
}
?>