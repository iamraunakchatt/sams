<?php 

include('../config/webconfig.php');
$sql = "UPDATE 04_department_management SET departmenet_name='Rahil' WHERE id=9";

if (mysqli_query($conn, $sql)) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>