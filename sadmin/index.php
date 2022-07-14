<?php include ('inc/header.php'); ?>


<div class="page-wrapper">

<div class="content container-fluid">
<div class="row">
<div class="col-md-8 offset-md-2">

<div class="page-header">
<div class="row">
<div class="col-sm-12">
<h3 class="page-title">Company Settings</h3>
</div>
</div>
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
<form method="post" action="action/addadmin_action.php" enctype="multipart/form-data">
<div class="row">
<div class="col-sm-12">
<div class="form-group">
<label>Company Name <span class="text-danger">*</span></label>
<input class="form-control" type="text" placeholder="eg. Dreamguy's Technologies" value="<?php echo $row["cname"]; ?>" name="cname" required>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-6">
<div class="form-group">
<label>Address 1</label>
<input class="form-control " placeholder="eg. 3864 Quiet Valley Lane" type="text" value="<?php echo $row["address1"]; ?>" name="address1" required>
</div>
</div>
<div class="col-sm-6">
<div class="form-group">
<label>Address 2</label>
<input class="form-control " placeholder="eg. Sherman Oaks, CA, 91403" type="text" value="<?php echo $row["address2"]; ?>" name="address2">
</div>
</div>
<div class="col-sm-6 col-md-6 col-lg-6">
<div class="form-group">
<label>City</label>
<input class="form-control" placeholder="eg. Oaks" type="text" value="<?php echo $row["city"]; ?>" name="city" required>
</div>
</div>
<div class="col-sm-6 col-md-6 col-lg-6">
<div class="form-group">
<label>Postal Code</label>
<input class="form-control" placeholder="eg. 91403" type="text" value="<?php echo $row["zipcode"]; ?>" name="zipcode" required>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-6">
<div class="form-group">
<label>Latitude</label>
<input class="form-control" placeholder="eg. 121.56" type="number" value="<?php echo $row["latitude"]; ?>" required name="latitude">
</div>
</div>
<div class="col-sm-6">
<div class="form-group">
<label>Longtitude</label>
<input class="form-control" placeholder="eg. 22.5" type="number" value="<?php echo $row["longitude"]; ?>" required name="lontitude">
</div>
</div>
</div>
<div class="row">
<div class="col-sm-12">
<div class="form-group">
<label>Radius in Meter <span style="font-size:12px">(Set Radius between 100m - 500m.By setting radus, employees can mark attendace inside in this set radis only.)</label>
<input class="form-control" placeholder="eg. 250" type="number" value="<?php echo $row["radius"]; ?>" required min="100" max="500" name="radius">
</div>
</div>
<div class="col-sm-6">
<div class="form-group">
<label>Upload Logo</label>
<input type="file" class="form-control" name="clogo" id="imgInp">
<input type="hidden" class="form-control" name="flogo" value="<?php echo $row["logo"]; ?>">
</div>
</div>
<div class="col-lg-2">
<label>&nbsp;</label>
<div class="img-thumbnail float-end"><img src="action/logo/<?php echo $row["logo"]; ?>" class="img-fluid" alt="" width="140" height="40" id="blah"></div>
</div>
<div class="col-sm-4">
<div class="form-group">
<label>Max Locations</label>
<input class="form-control" placeholder="eg. 4" type="text" value="<?php echo $row["mlocation"]; ?>" name="mlocation" >
</div>
</div>
</div>
<div class="row">
<div class="col-sm-6">
<div class="form-group">
<label>Max Employees</label>
<input class="form-control" placeholder="eg. 10" type="text" value="<?php echo $row["memployee"]; ?>" name="memployee">
</div>
</div>
<div class="col-sm-6">
<div class="form-group">
<label>Attendance Type</label>
<select class="select" name="atype">
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
} ?>

</select>
</div>
</div>

<div class="col-sm-6">
<div class="form-group">
<label>Employees Attendance Mark by Admin :</label>
</div>
</div>

<div class="col-sm-2">
<div class="onoffswitch">
<input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="switch_hra"
<?php if($row["empattbyadmin"]=="yes"){
?>
checked value="yes"
<?php
}else{
?>
value="no"
<?php
} ?>
>
<label class="onoffswitch-label" for="switch_hra">
<span class="onoffswitch-inner"></span>
<span class="onoffswitch-switch"></span>
</label>
</div>
</div>



<div class="col-sm-6">
<div class="form-group">
<label>Admin App License Valid From Date</label>
<input class="form-control" placeholder="eg. 5/28/2022" type="date" value="<?php echo $row["validfrom"]; ?>" name="validfrom">
</div>
</div>
<div class="col-sm-6">
<div class="form-group">
<label>Employee App License Valid Till Date</label>
<input class="form-control" placeholder="eg. 5/28/2022" type="date" value="<?php echo $row["validtill"]; ?>" name="validtill">
</div>
</div>
<div class="col-sm-6">
<div class="form-group">
<label>Super Admin Change Password</label>
<input class="form-control" placeholder="Set This Password For Super Admin" type="password"  id="txtPassword" name="sppassword">
</div>
</div>
<div class="col-sm-6">
<div class="form-group">
<label>Super Admin Confirm Change Password</label>
<input class="form-control" id="txtConfirmPassword" placeholder="Repeat Super Admin New Password" type="password" >
</div>
</div>


<div class="col-sm-6">
<div class="form-group">
<label>Admin Change Password</label>
<input class="form-control" placeholder="eg. 123456" type="password" value="<?php echo $row["password"]; ?>" id="txtPassword1" name="password">
</div>
</div>
<div class="col-sm-6">
<div class="form-group">
<label>Admin Confirm Change Password</label>
<input class="form-control" id="txtConfirmPassword1" placeholder="eg. 123456" type="password" value="<?php echo $row["password"]; ?>">
</div>
</div>
</div>
<div class="submit-section">
<button class="btn btn-primary submit-btn" type="submit" style="width:100%">Save</button>
</div>
</form>
<?php
	   }
	   ?>
</div>
</div>
</div>

</div>

</div>


<?php include ('inc/footer.php'); ?>
<script type="text/javascript">
    window.onload = function () {
        var txtPassword = document.getElementById("txtPassword");
        var txtConfirmPassword = document.getElementById("txtConfirmPassword");
        txtPassword.onchange = ConfirmPassword;
        txtConfirmPassword.onkeyup = ConfirmPassword;
        function ConfirmPassword() {
            txtConfirmPassword.setCustomValidity("");
            if (txtPassword.value != txtConfirmPassword.value) {
                txtConfirmPassword.setCustomValidity("Passwords do not match.");
            }
        }
    }
</script>
<script type="text/javascript">
    window.onload = function () {
        var txtPassword1 = document.getElementById("txtPassword1");
        var txtConfirmPassword1 = document.getElementById("txtConfirmPassword1");
        txtPassword1.onchange = ConfirmPassword1;
        txtConfirmPassword1.onkeyup = ConfirmPassword1;
        function ConfirmPassword1() {
            txtConfirmPassword1.setCustomValidity("");
            if (txtPassword1.value != txtConfirmPassword1.value) {
                txtConfirmPassword1.setCustomValidity("Passwords do not match.");
            }
        }
    }
</script>
<script>
    imgInp.onchange = evt => {
  const [file] = imgInp.files
  if (file) {
    blah.src = URL.createObjectURL(file)
  }
}
</script>