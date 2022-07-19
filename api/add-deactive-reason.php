<?php 
include('../config/webconfig.php'); 


if (isset($_POST['deparment_name']))
{
    $name=stripslashes(mysqli_real_escape_string($conn,$_POST['deactive_reason']));
    
    $sql = "INSERT INTO  08_deative_reason_management(deactive_reason) VALUES ('$name')";
           
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