<?php 
include('../config/webconfig.php'); 
$sql = "select * from   16_admin_token"; 
$result = mysqli_query($conn,$sql); 
$data=mysqli_fetch_array($result); 

$status=$data['status'];
if($status==1)
{

if (isset($_POST['branch_type_name']))
{
    $name=stripslashes(mysqli_real_escape_string($conn,$_POST['branch_type_name']));
    
    $sql = "INSERT INTO  15_branch_type_management(branch_type_name) VALUES ('$name')";
           
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