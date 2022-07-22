
<?php 
  include('../config/webconfig.php');

  $sql = "select * from   16_admin_token"; 
   $result = mysqli_query($conn,$sql); 
   $data=mysqli_fetch_array($result); 
   $status=$data['status'];

   if($status==1)
    {

  $id=$_GET['id'];
    
    $branch_type=stripslashes(mysqli_real_escape_string($conn,$_POST['branch_type']));
    $branch_name=stripslashes(mysqli_real_escape_string($conn,$_POST['branch_name']));
    $address_1=stripslashes(mysqli_real_escape_string($conn,$_POST['address_1']));
    $address_2=stripslashes(mysqli_real_escape_string($conn,$_POST['address_2']));
    $city=stripslashes(mysqli_real_escape_string($conn,$_POST['city']));
    $pincode=stripslashes(mysqli_real_escape_string($conn,$_POST['pincode']));
    $contact_number=stripslashes(mysqli_real_escape_string($conn,$_POST['contact_number']));
    $user_type=stripslashes(mysqli_real_escape_string($conn,$_POST['user_type']));
    $attendance_type=stripslashes(mysqli_real_escape_string($conn,$_POST['attendance_type']));
    $latitudes=stripslashes(mysqli_real_escape_string($conn,$_POST['latitudes']));
    $longitude=stripslashes(mysqli_real_escape_string($conn,$_POST['longitude']));
    $radius_meter=stripslashes(mysqli_real_escape_string($conn,$_POST['radius_meter']));
    
  
    $sql ="UPDATE  12_branch_management SET branch_type='".$branch_type."',branch_name='".$branch_name."',address_1='".$address_1."',address_2='".$address_2."',city='".$city."',pincode='".$pincode."',contact_no='".$contact_number."',attendance_type='".$attendance_type."',latitude='".$latitudes."',longtitude='".$longitude."',radius_meter='".$radius_meter."',user_type='".$user_type."'  where id='".$id."'"; 
   
    // mysqli_query($conn,$sql);
   

    if(mysqli_query($conn, $sql)){
       
      echo json_encode(array('message'=>'Data Update successfully'));   
               
    } else{
      echo json_encode(array('message'=>'Data not Update'));
    } 
  }
  else
  {
    echo json_encode(array('message'=>'Unauthenticated'));  
  }
?>


















