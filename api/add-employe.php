

<?php 

  include('../config/webconfig.php');
  
  if (isset($_POST['branch']))
  {
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
        $destination = 'userimg/' . $new_name;
        move_uploaded_file($_FILES['filetoupload']['tmp_name'], $destination);
        return $new_name;
       }
      }
      
      $image = '';
      if($_FILES["filetoupload"]["name"] != '')
      {
       $image = upload_image2();
      }else{
        $image='default.jpeg';
      }
  
    
          $sql = "INSERT INTO  13_employee(branch_id,employee_id,employee_name,employee_father_name,employee_address_one,employee_address_two,city,pincode,dob,mobile_no,email_address,department_id,designation_id,shift_id,attendance,passwordd,confirm_password,emp_image) VALUES ('$branch','$employee_id','$employee_name','$employee_fateher_name','$employee_address_1','$employee_address_2','$city','$pincode','$dob','$mobile_no','$email_address','$department','$designation','$shift','$attendance_type','$password','$confirm_password','$image')";
if(mysqli_query($conn, $sql)){
            echo json_encode(array('message'=>'Data Insert successfully'));
               
    } else
    {
            echo json_encode(array('message'=>'Data not Insert'));
    }
         
}
else
{
    echo json_encode(array('message'=>'Data not Insert'));
}
?>
