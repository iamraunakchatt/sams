<?php 
include('../config/webconfig.php'); 

$branch_id=$_GET['branch_id'];
$sql=mysqli_query($conn,"select 019_leave_request.id,019_leave_request.from_date,019_leave_request.to_date,019_leave_request.emp_id,13_employee.employee_name,13_employee.emp_image,06_designation_management.designation_name, 019_leave_request.reason,019_leave_request.status from 019_leave_request INNER JOIN 13_employee
ON 019_leave_request.emp_id=13_employee.id INNER JOIN
  06_designation_management
ON
  13_employee.designation_id=06_designation_management.id
  where 13_employee.branch_id=$branch_id;")or die(mysqli_error($con));

if(mysqli_num_rows($sql)>0){

    $output=mysqli_fetch_all($sql,MYSQLI_ASSOC);
    echo json_encode($output);
}
else
{
    echo json_encode(array('message'=>'No Record Found'));
}
?>