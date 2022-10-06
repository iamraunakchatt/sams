<?php 
include('../config/webconfig.php'); 
$date=$_GET['date'];
$branch=$_GET['branch'];
$sql=mysqli_query($conn,"select GROUP_CONCAT(DISTINCT(21_attendance_type.employee_id)) from 21_attendance_type INNER JOIN 13_employee
ON 21_attendance_type.employee_id=13_employee.id where 21_attendance_type.date='".$date."' AND 13_employee.branch_id='".$branch."' ")or die(mysqli_error($con));
if(mysqli_num_rows($sql)>0){

    $output=mysqli_fetch_all($sql,MYSQLI_ASSOC);
    //print_r($output);
    $presentemp= $output[0]['GROUP_CONCAT(DISTINCT(21_attendance_type.employee_id))'];
    
    
    $sql1=mysqli_query($conn,"select 13_employee.id,13_employee.employee_name,06_designation_management.designation_name,13_employee.emp_image,13_employee.branch_id from 13_employee INNER JOIN
  06_designation_management
ON
  13_employee.designation_id=06_designation_management.id where 13_employee.id NOT IN($presentemp) AND 13_employee.branch_id='".$branch."' ")or die(mysqli_error($con));

if(mysqli_num_rows($sql1)>0){

    $output1=mysqli_fetch_all($sql1,MYSQLI_ASSOC);
    echo json_encode($output1);
}
else
{
    echo json_encode(array('message'=>'No Record Found'));
}
}
else
{
    echo json_encode(array('message'=>'All Present'));
}
?>