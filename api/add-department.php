<?php 
include('../config/webconfig.php'); 
$sql = "select * from   16_admin_token"; 
$result = mysqli_query($conn,$sql); 
$data=mysqli_fetch_array($result); 

$status=$data['status'];
if($status==1)
{

if (isset($_POST['deparment_name']))
{
    $sql = "select * from   04_department_management"; 
    $result = mysqli_query($conn,$sql); 
    $data=mysqli_fetch_array($result); 

    
    $name=stripslashes(mysqli_real_escape_string($conn,$_POST['deparment_name']));


  
        $sql = "INSERT INTO  04_department_management(departmenet_name) VALUES ('$name')";
         
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