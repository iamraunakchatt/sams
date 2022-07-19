<?php 
$conn=mysqli_connect("localhost","root","","sams_db");
$id = $_GET['id']; 

 $sql ="delete from   10_user_type  where id='".$id."'"; 
 if(mysqli_query($conn, $sql)){

    echo json_encode(array('message'=>'Data Delete successfully'));
       
} 
else
{
    echo json_encode(array('message'=>'Data not Delete'));
}
?>