

<?php include('include/header.php'); 
  include('../config/webconfig.php');
  session_start();

  if (isset($_POST['save']))
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
  
      
    //   $target_dir = "uploads/testimonial/";
    //   $target_file = $target_dir . basename($_FILES["filetoupload"]["name"]);
    //   $uploadOk = 1;
    //   $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  
    //   $check = getimagesize($_FILES["filetoupload"]["tmp_name"]);
    //   if($check !== false) {
    //       echo "File is an image - " . $check["mime"] . ".";
    //       $uploadOk = 1;
    //   } else {
    //       echo "File is not an image.";
    //       $uploadOk = 0;
    //   }
  
      
     // Performing insert query execution
          // here our table name is college
          $sql = "INSERT INTO  13_employee(branch_id,employee_id,employee_name,employee_father_name,employee_address_one,employee_address_two,city,pincode,dob,mobile_no,email_address,department_id,designation_id,shift_id,attendance,passwordd,confirm_password) VALUES ('$branch','$employee_id','$employee_name','$employee_fateher_name','$employee_address_1','$employee_address_2','$city','$pincode','$dob','$mobile_no','$email_address','$department','$designation','$shift','$attendance_type','$password','$confirm_password')";
           
          if(mysqli_query($conn, $sql)){
            
            $_SESSION['add_message'] = "Data Insert successfully.";
            header("Location: employee.php"); 
                 
          } else{
             echo "<script>alert('Data Not insert.')</script> $sql. "
                  . mysqli_error($conn);
          }
           
          // Close connection
         
  }
?>
<div class="page-wrapper">
<div class="content container-fluid">

<div class="page-header">
<div class="row">
<div class="col">
<h3 class="page-title"></h3>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item"><a href="#">Master</a></li>
<li class="breadcrumb-item active">Branch Management</li>
</ul>
</div>
</div>
</div>

<div class="row">
<div class="col-sm-12">
<div class="card mb-0">
<div class="card-header">
	<div class="row">
		<div class="col-md-8">
		<h4 class="card-title mb-0">Add Branch </h4>

		</div>
		
	</div>


</div>
<div class="card-body">
<div class="table-responsive">
<input type="hidden"value="branch"id="anchor_value">


<form method="post">
    <div class="modal-content">
      
      <div class="modal-body">
        <div class="form-group">
          <label>Select Branch</label>
          <br>
          <select name="branch"class="form-control"required>
              <option value="">Choose Branch </option>
              <?php
                $i=1;
                $sql=mysqli_query($conn,"select * from  12_branch_management")or die(mysqli_error($con));
                while($row=mysqli_fetch_array($sql))
                {
                echo '
                        <option value="'.$row['id'].'">'.$row['branch_name'].'</option>';
                }
             ?>
              
            </select>
        </div>
        <div class="form-group">
          <label>Select Employee Type</label>
          <br>
          <select name="employee_id"class="form-control"required>
              <option value="">Choose Employee </option>
              <?php
                $i=1;
                $sql=mysqli_query($conn,"select * from   05_employee_management")or die(mysqli_error($con));
                while($row=mysqli_fetch_array($sql))
                {
                echo '
                        <option value="'.$row['id'].'">'.$row['employee_name'].'</option>';
                }
             ?>
              
            </select>
        </div>
       
        <div class="form-group">
          <label>Employee Name</label>
          <br>
          <input type="text"name="employee_name"class="form-control"required>
        </div>
        <div class="form-group">
          <label>Employee Father Name</label>
          <br>
          <input type="text"name="employee_fateher_name"class="form-control"required>
        </div>
        <div class="form-group">
          <label>Employee Address 1</label>
          <br>
          <input type="text"name="employee_address_1"class="form-control"required>
        </div>
        <div class="form-group">
          <label>Employee Address 2</label>
          <br>
          <input type="text"name="employee_address_2"class="form-control"required>
        </div>
        <div class="form-group">
          <label>City</label>
          <br>
          <input type="text"name="city"class="form-control"required>
        </div>
        <div class="form-group">
          <label>Pincode</label>
          <br>
          <input type="text"name="pincode"class="form-control"required>
        </div>
        <div class="form-group">
          <label>DOB</label>
          <br>
          <input type="date"name="dob"class="form-control"required>
        </div>
        <div class="form-group">
          <label>Mobile No</label>
          <br>
          <input type="text"name="mobile_no"class="form-control"required>
        </div>
        <div class="form-group">
          <label>Email Address</label>
          <br>
          <input type="email"name="email_address"class="form-control"required>
        </div>

        
        
        <div class="form-group">
          <label>Select Department</label>
          <br>
          <select name="department"class="form-control"required>
              <option value="">Choose Department</option>
              <?php
                $i=1;
                $sql=mysqli_query($conn,"select * from   04_department_management")or die(mysqli_error($con));
                while($row=mysqli_fetch_array($sql))
                {
                echo '
                        <option value="'.$row['id'].'">'.$row['departmenet_name'].'</option>';
                }
             ?>
              
        </select>
        </div>
        <div class="form-group">
          <label>Select Designation</label>
          <br>
          <select name="designation"class="form-control"required>
              <option value="">Choose Designation</option>
              <?php
                $i=1;
                $sql=mysqli_query($conn,"select * from  06_designation_management")or die(mysqli_error($con));
                while($row=mysqli_fetch_array($sql))
                {
                echo '
                        <option value="'.$row['id'].'">'.$row['designation_name'].'</option>';
                }
             ?>
              
        </select>
      </div>

      <div class="form-group">
          <label>Select Shift</label>
          <br>
          <select name="shift"class="form-control"required>
              <option value="">Choose Shift</option>
              <?php
                $i=1;
                $sql=mysqli_query($conn,"select * from  11_shift_management")or die(mysqli_error($con));
                while($row=mysqli_fetch_array($sql))
                {
                echo '
                        <option value="'.$row['id'].'">'.$row['shift_name'].'</option>';
                }
             ?>
              
        </select>
      </div>

      <div class="form-group">
          <label>Attendance Type</label>
          <br>
          <select name="attendance_type"class="form-control"required>
              <option value="">Choose Attendance Type</option>
              <option value="Manual">Manual</option>
              <option value="Selfie">Selfie</option>
              <option value="Auto">Auto</option>
              
        </select>
      </div>
      <div class="form-group">
          <label>Password</label>
          <br>
          <input id="pass"type="password"class="form-control"name="password"required"">
          <!-- <input type="password"name="password"class="form-control"required> -->
        </div>
        <div class="form-group">
          <label>Confirm Password</label>
          <br>
          <input id="confirm_pass"class="form-control"type="password"name="confirm_password"required onkeyup="validate_password()">
          <!-- <input type="password"name="confirm_password"class="form-control"required> -->
          <span id="wrong_pass_alert"></span>
        </div>

        <div class="form-group">
          <label>Image</label>
          <br>
          <input type="file" name="filetoupload"  class="form-control">

        </div>
       
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="save" class="btn btn-primary">Save changes</button>
      </div>
    </div>
</div>
</form>

</div>
</div>
</div>
</div>
</div>
</div>
</div>

</div>


<?php include('include/footer.php'); ?>