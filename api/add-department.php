<?php 
include('../config/webconfig.php'); 


if (isset($_POST['deparment_name']))
{
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

?>