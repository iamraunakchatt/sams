

<?php include('include/header.php'); 
  include('../config/webconfig.php');

  $id = $_GET['id']; 
  $sql = "select * from 13_employee where id='".$id."'"; 
  $result = mysqli_query($conn,$sql); 
  $data=mysqli_fetch_array($result); 
  $vbranch_id=$data['branch_id'];
  $vemployee_id=$data['employee_id'];
  $vemployee_name=$data['employee_name'];
  $vemployee_father_name=$data['employee_father_name'];
  $vemployee_address_one=$data['employee_address_one'];
  $vemployee_address_two=$data['employee_address_two'];
  $vcity=$data['city'];
  $vpincode=$data['pincode'];
  $vdob=$data['dob'];
  $vmobile_no=$data['mobile_no'];
  $vemail_address=$data['email_address'];
  $vdepartment_id=$data['department_id'];
  $vdesignation_id=$data['designation_id'];
  $vshiftname=$data['shift_id'];
  $vattendance=$data['attendance'];
  $vpassword=$data['passwordd'];
  $vconfirm_password=$data['confirm_password'];
  $vuserimg= $data['emp_image']; 
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
            $image=$_POST['altfiletoupload'];
          }

          $sql ="UPDATE  13_employee SET branch_id='".$branch."',employee_id='".$employee_id."',employee_name='".$employee_name."',employee_father_name='".$employee_fateher_name."',employee_address_one='".$employee_address_1."',employee_address_two='".$employee_address_2."',city='".$city."',pincode='".$pincode."',dob='".$dob."',mobile_no='".$mobile_no."',email_address='".$email_address."',department_id='".$department."',designation_id='".$designation."',shift_id='".$shift."',attendance='".$attendance_type."',passwordd='".$password."',confirm_password='".$confirm_password."',emp_image='$image' where id='".$id."'"; 
   
    // mysqli_query($conn,$sql);
   

    if(mysqli_query($conn, $sql)){
       
      echo "<script type='text/javascript'> document.location = 'employee.php?status=success'; </script>";

               
    } else{
      echo "<script type='text/javascript'> document.location = 'employee.php?status=failed'; </script>";

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
		<h4 class="card-title mb-0">Edit Employee </h4>

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
              
              <?php
                $i=1;
                $sql=mysqli_query($conn,"select * from  12_branch_management order by branch_name asc")or die(mysqli_error($con));
                while($row=mysqli_fetch_array($sql))
                {
                    $branchname=$row['branch_name'];
                    $branchid=$row['id'];
                    echo'<option value="'.$branchid.'"';if ($branchid==$vbranch_id){echo 'selected';}echo '>'.$branchname.'</option>';
                }
             ?>
              
            </select>
        </div>
        <div class="form-group">
          <label>Select Employee Type</label>
          <br>
          <select name="employee_id"class="form-control"required>
             
              <?php
                $i=1;
                $sql=mysqli_query($conn,"select * from   05_employee_management")or die(mysqli_error($con));
                while($row=mysqli_fetch_array($sql))
                {
               

                    $empname=$row['employee_name'];
                    $empid=$row['id'];
                    echo'<option value="'.$empid.'"';if ($empid==$vemployee_id){echo 'selected';}echo '>'.$empname.'</option>';
                }
             ?>
              
            </select>

            
        </div>
       
        <div class="form-group">
          <label>Employee Name</label>
          <br>
          <input type="text"name="employee_name"value="<?php echo $vemployee_name; ?>"class="form-control"required>
        </div>
        <div class="form-group">
          <label>Employee Father Name</label>
          <br>
          <input type="text"name="employee_fateher_name"value="<?php echo $vemployee_father_name; ?>"class="form-control"required>
        </div>
        <div class="form-group">
          <label>Employee Address 1</label>
          <br>
          <input type="text"name="employee_address_1"value="<?php echo $vemployee_address_one; ?>"class="form-control"required>
        </div>
        <div class="form-group">
          <label>Employee Address 2</label>
          <br>
          <input type="text"name="employee_address_2"value="<?php echo $vemployee_address_two; ?>"class="form-control"required>
        </div>
        <div class="form-group">
          <label>City</label>
          <br>
          <input type="text"name="city"value="<?php echo $vcity; ?>"class="form-control"required>
        </div>
        <div class="form-group">
          <label>Pincode</label>
          <br>
          <input type="text"name="pincode"value="<?php echo $vpincode; ?>"class="form-control"required>
        </div>
        <div class="form-group">
          <label>DOB</label>
          <br>
          <input type="date"name="dob"value="<?php echo $vdob; ?>"class="form-control"required>
        </div>
        <div class="form-group">
          <label>Mobile No</label>
          <br>
          <input type="text"name="mobile_no"value="<?php echo $vmobile_no; ?>"class="form-control"required>
        </div>
        <div class="form-group">
          <label>Email Address</label>
          <br>
          <input type="email"name="email_address"value="<?php echo $vemail_address; ?>"class="form-control"required>
        </div>

        
        
        <div class="form-group">
          <label>Select Department</label>
          <br>
          <select name="department"class="form-control"required>
             
              <?php
                $i=1;
                $sql=mysqli_query($conn,"select * from   04_department_management order by departmenet_name asc")or die(mysqli_error($con));
                while($row=mysqli_fetch_array($sql))
                {
                    $depname=$row['departmenet_name'];
                    $depid=$row['id'];
                    echo'<option value="'.$depid.'"';if ($depid==$vdepartment_id){echo 'selected';}echo '>'.$depname.'</option>';
                }
             ?>
              
        </select>
        </div>
        <div class="form-group">
          <label>Select Designation</label>
          <br>
          <select name="designation"class="form-control"required>
              
              <?php
                $i=1;
                $sql=mysqli_query($conn,"select * from  06_designation_management order by designation_name asc")or die(mysqli_error($con));
                while($row=mysqli_fetch_array($sql))
                {
                    $desname=$row['designation_name'];
                    $desid=$row['id'];
                    echo'<option value="'.$desid.'"';if ($desid==$vdesignation_id){echo 'selected';}echo '>'.$desname.'</option>';
                }
             ?>
              
        </select>
      </div>

      <div class="form-group">
          <label>Select Shift</label>
          <br>
          <select name="shift"class="form-control"required>
              
              <?php
                $i=1;
                $sql=mysqli_query($conn,"select * from  11_shift_management order by shift_name asc")or die(mysqli_error($con));
                while($row=mysqli_fetch_array($sql))
                {
                    $shiftname=$row['shift_name'];
                    $shiftid=$row['id'];
                    echo'<option value="'.$shiftid.'"';if ($shiftid==$vshiftname){echo 'selected';}echo '>'.$shiftname.'</option>';
                }
             ?>
              
        </select>
      </div>

      <?php
        $statement = $connection->prepare(
          "SELECT * FROM 03_admin_tbl ORDER BY id DESC LIMIT 1"
           );
           $statement->execute();
           $result = $statement->fetchAll();
           foreach($result as $row)
           {
            ?>
            <div class="form-group">
<label>Attendance Type</label>
<select class="select" name="atype[]" multiple disabled>
<?php if($row["atype"]=="auto"){
?>
<option selected="selected" value="auto">Auto</option>
<option value="manual">Manual</option>
<option value="selfie">Selfie</option>
<?php
}else if($row["atype"]=="manual"){
?>
<option  value="auto">Auto</option>
<option selected="selected" value="manual">Manual</option>
<option value="selfie">Selfie</option>
<?php
}else if($row["atype"]=="selfie"){
?>
<option value="auto">Auto</option>
<option value="manual">Manual</option>
<option selected="selected" value="selfie">Selfie</option>
<?php
} else if($row["atype"]=="auto,manual" || $row["atype"]=="manual,auto"){
    ?>
    <option selected="selected" value="auto">Auto</option>
    <option selected="selected" value="manual">Manual</option>
    <option  value="selfie">Selfie</option>
    <?php
    } else if($row["atype"]=="auto,selfie" || $row["atype"]=="selfie,auto"){
        ?>
        <option selected="selected" value="auto">Auto</option>
        <option  value="manual">Manual</option>
        <option selected="selected" value="selfie">Selfie</option>
        <?php
        } else if($row["atype"]=="manual,selfie" || $row["atype"]=="selfie,manual"){
            ?>
            <option  value="auto">Auto</option>
            <option selected="selected" value="manual">Manual</option>
            <option selected="selected" value="selfie">Selfie</option>
            <?php
            } else if($row["atype"]=="manual,selfie,auto" || $row["atype"]=="selfie,manual,auto" || $row["atype"]=="auto,manual,selfie" || $row["atype"]=="auto,selfie,manual" || $row["atype"]=="manual,auto,selfie" || $row["atype"]=="selfie,auto,manual"){
                ?>
                <option  selected="selected" value="auto">Auto</option>
                <option selected="selected" value="manual">Manual</option>
                <option selected="selected" value="selfie">Selfie</option>
                <?php
                } ?>

</select>
</div>
<?php
           }
           ?>
      <div class="form-group position-relative">
          <label>Password</label>
          <br>
          <input id="pass"type="password"value="<?php echo  $vpassword?>"class="form-control"name="password"required"">
          <span class="fa fa-eye-slash" id="toggle-password3"></span>
        </div>
        <div class="form-group position-relative">
          <label>Confirm Password</label>
          <br>
          <input id="confirm_pass"class="form-control" value="<?php echo  $vconfirm_password?>"type="password"name="confirm_password"required onkeyup="validate_password()">
          <span class="fa fa-eye-slash" id="toggle-password4"></span>
        </div>

        <div class="form-group">
        <img alt="" src="userimg/<?php echo $vuserimg; ?>" style="width: 50px;border-radius: 50%;">
        <br/>
          <label>Image</label>
          <br>
          <input type="file" name="filetoupload"  class="form-control">
          <input type="hidden" name="altfiletoupload"  class="form-control" value="<?php echo $vuserimg; ?>">

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