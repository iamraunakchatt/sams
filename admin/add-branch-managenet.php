

<?php include('include/header.php'); 
  include('../config/webconfig.php');
  session_start();

if (isset($_POST['save']))
{
    $branch_type=stripslashes(mysqli_real_escape_string($conn,$_POST['branch_type']));
    $branch_name=stripslashes(mysqli_real_escape_string($conn,$_POST['branch_name']));
    $address_1=stripslashes(mysqli_real_escape_string($conn,$_POST['address_1']));
    $address_2=stripslashes(mysqli_real_escape_string($conn,$_POST['address_2']));
    $city=stripslashes(mysqli_real_escape_string($conn,$_POST['city']));
    $pincode=stripslashes(mysqli_real_escape_string($conn,$_POST['pincode']));
    $contact_number=stripslashes(mysqli_real_escape_string($conn,$_POST['contact_number']));
    $user_type=stripslashes(mysqli_real_escape_string($conn,$_POST['user_type']));
    $attendance_type=stripslashes(mysqli_real_escape_string($conn,$_POST['attendance_type']));
    $latitudes=stripslashes(mysqli_real_escape_string($conn,$_POST['latitudes']));
    $longitude=stripslashes(mysqli_real_escape_string($conn,$_POST['longitude']));
    $radius_meter=stripslashes(mysqli_real_escape_string($conn,$_POST['radius_meter']));
    
   // Performing insert query execution
        // here our table name is college
        $sql = "INSERT INTO   12_branch_management(branch_type,branch_name,address_1,address_2,city,pincode,contact_no,user_type,attendance_type,latitude,longtitude,radius_meter) VALUES ('$branch_type','$branch_name','$address_1','$address_2','$city','$pincode','$contact_number','$user_type','$attendance_type','$latitudes','$longitude','$radius_meter')";
         
        if(mysqli_query($conn, $sql)){
          $_SESSION['add_message'] = "Data Insert successfully.";
               
        } else{
           echo "<script>alert('Data Not insert.')</script> $sql. "
                . mysqli_error($conn);
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
<?php if (isset($_SESSION['success_message']) && !empty($_SESSION['success_message'])) { ?>
                        <div class="success-message " style="margin-bottom: 20px;font-size: 20px;color: green;"><?php echo $_SESSION['success_message']; ?></div>
                        <?php
                        unset($_SESSION['success_message']);
                    }
                    ?>
<?php if (isset($_SESSION['add_message']) && !empty($_SESSION['add_message'])) { ?>
                        <div class="success-message " style="margin-bottom: 20px;font-size: 20px;color: green;"><?php echo $_SESSION['add_message']; ?></div>
                        <?php
                        unset($_SESSION['add_message']);
                    }
?>

<form method="post">
    
        <div class="form-group">
          <label>Branch Type</label>
          <br>
          <select name="branch_type"class="form-control"required>
              <option value="">Choose Branch Type</option>
              <option value="HQ">HQ</option>
              <option value="Branch office">Branch Office</option>
              <option value="Location">Locatio</option>
              <option value="Factory">Factory</option>
              <option value="Godown">Godown</option>
              <option value="Warehouse">Warehouse</option>
              <option value="Shop">Shop</option>
            </select>
        </div>
        <div class="form-group">
          <label>Branch Name</label>
          <br>
          <input type="text"name="branch_name"class="form-control"required>
        </div>
        <div class="form-group">
          <label>Address1</label>
          <br>
          <input type="text"name="address_1"class="form-control"required>
        </div>
        <div class="form-group">
          <label>Address2</label>
          <br>
          <input type="text"name="address_2"class="form-control"required>
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
          <label>Contact Number</label>
          <br>
          <input type="text"name="contact_number"class="form-control"required>
        </div>
        <div class="form-group">
          <label>User Type</label>
          <br>
          <select name="user_type"class="form-control"required>
              <option value="">Choose user Type</option>
              <?php
    $i=1;
    $sql=mysqli_query($conn,"select * from  10_user_type")or die(mysqli_error($con));
    while($row=mysqli_fetch_array($sql))
    {
      echo '
              <option value="'.$row['id'].'">'.$row['user_type'].'</option>';
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
          <label>Latitudes</label>
          <br>
          <input type="text"name="latitudes"class="form-control"required>
        </div>
        <div class="form-group">
          <label>Longitude</label>
          <br>
          <input type="text"name="longitude"class="form-control"required>
        </div>
        <div class="form-group">
          <label>Radius in Meter</label>
          <br>
          <input type="text"name="radius_meter"class="form-control"required>
        </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
       
      </div> -->
      <div class="submit-section">
       <button type="submit" name="save" class="btn btn-primary submit-btn" style="width:100%">Save changes</button>
        <!-- <button class="btn btn-primary submit-btn" type="submit" style="width:100%">Save</button> -->
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