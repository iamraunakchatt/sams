

<?php include('include/header.php'); 
  include('../config/webconfig.php');
  
  
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
  

     
      $email = strtolower($email_address);
      $mobile = strtolower($mobile_no);
      $i=1;
      $sql=mysqli_query($conn,"select * from 13_employee order by ID asc")or die(mysqli_error($con));
      while($row=mysqli_fetch_array($sql))
      {
              
              $valemail_address=$row['email_address'];
              $valmobile_no=$row['mobile_no'];
  
              
              $lowvalemail_address=strtolower($valemail_address);
              $lowvalmobile_no=strtolower($valmobile_no);
             

              if($lowvalmobile_no==$mobile)
              {
                $equal=2;
                break;
              }
  
              if($lowvalemail_address==$email)
              {
                $equal=3;
                break;
              }
              
  
  
      $i++;      
      }
     
      
        if($equal==2)
        {
          header("location: add-employee.php?status=mobile-number");
        }
        else{
  
          if($equal==3)
          {
            header("location: add-employee.php?status=emailaddress");
          }
          else{
      
      
     // Performing insert query execution
          // here our table name is college
          $sql = "INSERT INTO  13_employee(branch_id,employee_id,employee_name,employee_father_name,employee_address_one,employee_address_two,city,pincode,dob,mobile_no,email_address,department_id,designation_id,shift_id,attendance,passwordd,confirm_password,emp_image) VALUES ('$branch','$employee_id','$employee_name','$employee_fateher_name','$employee_address_1','$employee_address_2','$city','$pincode','$dob','$mobile_no','$email_address','$department','$designation','$shift','$attendance_type','$password','$confirm_password','$image')";
           
          if(mysqli_query($conn, $sql)){
            
            header("location: employee.php?status=success");  
                 
          } else{
            header("location: employee.php?status=failed");
          }
           
          // Close connection

        }
        // Close connection
      }

      
         
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
<li class="breadcrumb-item active">Employee Management</li>
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
		<h4 class="card-title mb-0">Add Employee </h4>

		</div>
		
	</div>


</div>
<div class="card-body">
<div class="table-responsive">
<input type="hidden"value="branch"id="anchor_value">


<form method="post" enctype="multipart/form-data">
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

      <div class="form-group" style="display:none">
          <label>Attendance Type</label>
          <br>
          <select name="attendance_type"class="form-control"required>
              <option value="Nothing">Choose Attendance Type</option>
              <option value="Manual">Manual</option>
              <option value="Selfie">Selfie</option>
              <option value="Auto">Auto</option>
              
        </select>
      </div>
      <div class="form-group position-relative">
          <label>Password</label>
          <br>
          <input id="pass"type="password"class="form-control"name="password" required"">
          <span class="fa fa-eye-slash" id="toggle-password1"></span>
        </div>
        <div class="form-group position-relative">
          <label>Confirm Password</label>
          <br>
          <input id="confirm_pass"class="form-control"type="password"name="confirm_password"required onkeyup="validate_password()">
          <span class="fa fa-eye-slash" id="toggle-password2"></span>
        </div>

        <div class="form-group">
          <label>Image</label>
          <br>
          <input type="file" name="filetoupload"  class="form-control">

        </div>
       
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="save" class="btn btn-primary">Save changes</button>
      </div> -->

      <div class="submit-section">
       <button type="submit" name="save" class="btn btn-primary submit-btn" style="width:100%">Save changes</button>
        <!-- <button class="btn btn-primary submit-btn" type="submit" style="width:100%">Save</button> -->
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