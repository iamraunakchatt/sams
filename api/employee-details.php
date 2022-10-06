<?php 
include('../config/webconfig.php'); 

$id=$_GET['id'];

$sql = "select 13_employee.id,13_employee.branch_id,13_employee.department_id,13_employee.designation_id,13_employee.shift_id,13_employee.employee_id,13_employee.employee_name,13_employee.employee_father_name,13_employee.employee_address_one,13_employee.employee_address_two,13_employee.city,13_employee.pincode,13_employee.dob,13_employee.mobile_no,13_employee.email_address,04_department_management.departmenet_name,06_designation_management.designation_name,11_shift_management.from_shift,11_shift_management.to_from,13_employee.attendance,13_employee.weekoff,13_employee.passwordd,13_employee.confirm_password,13_employee.emp_image,13_employee.status,13_employee.disble_reason,13_employee.sapp_login from 13_employee 
INNER JOIN 04_department_management
ON 13_employee.department_id=04_department_management.id
INNER JOIN 06_designation_management
ON 13_employee.designation_id=06_designation_management.id
INNER JOIN 11_shift_management
ON 13_employee.shift_id=11_shift_management.id where 13_employee.id='".$id."'"; 
$result = mysqli_query($conn,$sql); 
  
if(mysqli_num_rows($result)>0){

    $output=mysqli_fetch_all($result,MYSQLI_ASSOC);
    echo json_encode($output);
}
else{
 echo json_encode(array('message'=>'No Record Found'));
}
?>