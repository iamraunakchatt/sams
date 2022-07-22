
<?php 
  include('../config/webconfig.php');
  
  $sql = "select * from   16_admin_token"; 
  $result = mysqli_query($conn,$sql); 
  $data=mysqli_fetch_array($result); 
  $status=$data['status'];

  if($status==1)
   {

     
      $id=$_GET['id'];

      $branch=stripslashes(mysqli_real_escape_string($conn,$_POST['branch']));
      $employee_id=stripslashes(mysqli_real_escape_string($conn,$_POST['employee_id']));
      $employee_name=stripslashes(mysqli_real_escape_string($conn,$_POST['employee_name']));
      $employee_fateher_name=stripslashes(mysqli_real_escape_string($conn,$_POST['employee_fateher_name']));
      $employee_address_1=stripslashes(mysqli_real_escape_string($conn,$_POST['employee_address_1']));
      $employee_address_2=stripslashes(mysqli_real_escape_string($conn,$_POST['employee_address_2']));
      $city=stripslashes(mysqli_real_escape_string($conn,$_POST['city']));
      $pincode=stripslashes(mysqli_real_escape_string($conn,$_POST['pincode']));
      $dob=stripslashes(mysqli_real_escape_string($conn,$_POST['dob']));
      $mobile_no=stripslashes(mysqli_real_escape_string($conn,$_POST['mobile_no']));
      $email_address=stripslashes(mysqli_real_escape_string($conn,$_POST['email_address']));
      $department=stripslashes(mysqli_real_escape_string($conn,$_POST['department']));
      $designation=stripslashes(mysqli_real_escape_string($conn,$_POST['designation']));
      $shift=stripslashes(mysqli_real_escape_string($conn,$_POST['shift']));
      $attendance_type=stripslashes(mysqli_real_escape_string($conn,$_POST['attendance_type']));
      $password=stripslashes(mysqli_real_escape_string($conn,$_POST['password']));
      $confirm_password=stripslashes(mysqli_real_escape_string($conn,$_POST['confirm_password']));
  
   
          function upload_image2()
          {
           if(isset($_FILES["filetoupload"]))
           {
            $extension = explode('.', $_FILES['filetoupload']['name']);
            $new_name = date('m-d-Y_H_i_s').rand() . '.' . $extension[1];
            $destination = 'userimg/../' . $new_name;
            move_uploaded_file($_FILES['filetoupload']['tmp_name'], $destination);
            return $new_name;
           }
          }
          
          $image = '';
          if($_FILES["filetoupload"]["name"] != '')
          {
           $image = upload_image2();
          }else{
            $image=$_POST['altfiletoupload'];
          }

          $sql ="UPDATE  13_employee SET branch_id='".$branch."',employee_id='".$employee_id."',employee_name='".$employee_name."',employee_father_name='".$employee_fateher_name."',employee_address_one='".$employee_address_1."',employee_address_two='".$employee_address_2."',city='".$city."',pincode='".$pincode."',dob='".$dob."',mobile_no='".$mobile_no."',email_address='".$email_address."',department_id='".$department."',designation_id='".$designation."',shift_id='".$shift."',attendance='".$attendance_type."',passwordd='".$password."',confirm_password='".$confirm_password."',emp_image='$image' where id='".$id."'"; 
   
    // mysqli_query($conn,$sql);

if(mysqli_query($conn, $sql)){

  echo json_encode(array('message'=>'Data Update successfully'));
     
} 
else
{
  echo json_encode(array('message'=>'Data not Update'));
}

}
else
{
     echo json_encode(array('message'=>'Unauthenticated')); 
}
?>


















