<?php 
include('../config/webconfig.php'); 


if (isset($_POST['user_type']))
{
    $user_type=stripslashes(mysqli_real_escape_string($conn,$_POST['user_type']));
    $sql = "INSERT INTO  10_user_type(user_type) VALUES ('$user_type')";
           
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