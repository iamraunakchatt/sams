<?php 
include('../config/webconfig.php'); 

$sql=mysqli_query($conn,"SELECT b.branch_name, em.employee_name,e.id, e.employee_name, e.employee_father_name,e.employee_address_one,e.employee_address_two,e.city,e.pincode,e.dob,e.mobile_no,e.email_address,e.attendance,e.passwordd,e.confirm_password,e.emp_image,dm.departmenet_name,ds.designation_name,sh.shift_name FROM 13_employee AS e INNER JOIN 05_employee_management AS em ON e.employee_id = em.id INNER JOIN 04_department_management AS dm ON e.department_id = dm.id INNER JOIN 12_branch_management AS b ON e.branch_id=b.id INNER JOIN 06_designation_management AS ds ON e.designation_id=ds.id INNER JOIN  11_shift_management AS sh ON e.shift_id=sh.id;")or die(mysqli_error($con));

if(mysqli_num_rows($sql)>0){

    $output=mysqli_fetch_all($sql,MYSQLI_ASSOC);
    echo json_encode($output);
}
else
{
    echo json_encode(array('message'=>'No Record Found'));
}
?>


