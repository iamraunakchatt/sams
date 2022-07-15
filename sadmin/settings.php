<?php include ('inc/header.php'); ?>


<div class="page-wrapper">

<div class="content container-fluid">
<div class="row">
<div class="col-md-8 offset-md-2">

<div class="page-header">
<div class="row">
<div class="col-sm-12">
<h3 class="page-title">Super Admin Settings</h3>
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
<form method="post" action="action/password_action.php" enctype="multipart/form-data">
<div class="row">
<div class="col-sm-6">
<div class="form-group">
<label>Super Admin Change Password</label>
<input class="form-control" placeholder="Set This Password For Super Admin" type="password"  id="txtPassword" name="sppassword" required>
</div>
</div>
<div class="col-sm-6">
<div class="form-group">
<label>Super Admin Confirm Change Password</label>
<input class="form-control" id="txtConfirmPassword" placeholder="Repeat Super Admin New Password" type="password" required>
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

