<?php include('include/header.php'); 
  include('../config/webconfig.php'); 
  
if (isset($_POST['save']))
{
    
  if($_POST["sppassword"]!=NULL){
    $password=$_POST['sppassword'];
    mysqli_query($conn,"update 03_admin_tbl set password='$password' where id=1")or die(mysqli_error($conn));
  }
    $target_dir = "userimg/";
    $target_file = $target_dir . date('m-d-Y_H_i_s').rand().basename($_FILES["filetoupload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    $image=$_FILES["filetoupload"]["tmp_name"];

    if(!empty($image))
    {
    $check = getimagesize($_FILES["filetoupload"]["tmp_name"]);
    if($check !== false) 
    {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } 
    
    else 
    {
        echo "File is not an image.";
        $uploadOk = 0;
    }

  

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) 
    {
       echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
       $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) 
    {
       echo "Sorry, your file was not uploaded.";
       // if everything is ok, try to upload file
    }
    else 
    {
		// if($valimg!="")
		// {unlink($valimg);
		// }
       if (move_uploaded_file($_FILES["filetoupload"]["tmp_name"], $target_file))
       {
        echo "The file ". basename( $_FILES["filetoupload"]["name"]). " has been uploaded.";
        mysqli_query($conn,"update 03_admin_tbl set profilepic='$target_file' where id=1")or die(mysqli_error($conn));
        
       } 
       else 
       {
         echo "Sorry, there was an error uploading your file.";
       }
    } 
}
echo "<script type='text/javascript'> document.location = 'setting.php?status=success'; </script>";

}
  ?>

<div class="page-wrapper">

<div class="content container-fluid">
<div class="row">
<div class="col-md-8 offset-md-2">

<div class="page-header">
<div class="row">
<div class="col-sm-12">
<h3 class="page-title">Admin Settings</h3>
</div>
</div>
</div>
<?php
 $sql=mysqli_query($conn,"SELECT * FROM 03_admin_tbl ORDER BY id DESC LIMIT 1")or die(mysqli_error($con));
 while($row=mysqli_fetch_array($sql))
 {
?>
<form method="post" enctype="multipart/form-data">
<div class="row">
<div class="col-sm-6">
<div class="form-group">
<label>Upload Admin Profile Picture</label>
<input type="file" class="form-control" name="filetoupload" id="imgInp1">
<input type="hidden" class="form-control" name="filetoupload" value="<?php echo $row['logo']; ?>">
</div>
</div>
<div class="col-lg-2">
<label>&nbsp;</label>
<div class="img-thumbnail float-end"><img src="<?php echo $row['profilepic']; ?>" class="img-fluid" alt="" width="140" height="40" id="blah1"></div>
</div>
<div class="col-sm-6">
<div class="form-group position-relative">
<label>Admin Change Password</label>
<input class="form-control" placeholder="Set This Password For Super Admin" type="password"  id="txtPassword" name="sppassword">
<span class="fa fa-eye-slash" id="toggle-password3"></span>
</div>
</div>
<div class="col-sm-6">
<div class="form-group position-relative">
<label>Admin Confirm Change Password</label>
<input class="form-control" id="txtConfirmPassword" placeholder="Repeat Super Admin New Password" type="password" >
<span class="fa fa-eye-slash" id="toggle-password4"></span>
</div>
</div>
</div>
<div class="submit-section">
<button class="btn btn-primary submit-btn" type="submit" name="save"style="width:100%">Save</button>
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

<?php include('include/footer.php'); ?>
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
<script>
    imgInp1.onchange = evt => {
  const [file] = imgInp1.files
  if (file) {
    blah1.src = URL.createObjectURL(file)
  }
}
</script>
