

<?php include('include/header.php'); 
  include('../config/webconfig.php');

if (isset($_POST['save']))
{
    $name=stripslashes(mysqli_real_escape_string($conn,$_POST['branch_type_name']));
   // Performing insert query execution
        // here our table name is college
        $strlower = strtolower($name);
        $i=1;
        $sql=mysqli_query($conn,"select * from 15_branch_type_management order by id asc")or die(mysqli_error($con));
        while($row=mysqli_fetch_array($sql))
        {
                $department=$row['branch_type_name'];
                $depstrlower=strtolower($department);
                if($depstrlower==$strlower)
                {
                  $equal=1;
                  break;
                }
        $i++;      
        }
       
        if($equal==1)
        {
          header("location: branch-type.php?status=failed-data");
        }
    
        else{
        $sql = "INSERT INTO  15_branch_type_management(branch_type_name) VALUES ('$name')";
         
        if(mysqli_query($conn, $sql)){
          header("location: branch-type.php?status=success");
               
        } else{
          header("location: branch-type.php?status=failed");
        }
        }
         
        // Close connection mysqli_close($conn);
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

<li class="breadcrumb-item active">Branch Type Management</li>
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
		<h4 class="card-title mb-0">Branch Type </h4>

		</div>
		<div class="col-md-4">
		<a href="#" class="btn btn-primary" style="width: 100%;margin-top: 5%;" data-bs-toggle="modal" data-bs-target="#exampleModal">Add</a>
		</div>
	</div>


</div>
<div class="card-body">
<div class="table-responsive">
<input type="hidden"value="branch-type"id="anchor_value">

<table class="datatable table table-stripped mb-0">
<thead>
<tr>
<th>S.No.</th>
<th>Branch Type</th>
<th>Action</th>
</tr>
</thead>

<tbody>
<?php
    $i=1;
    $sql=mysqli_query($conn,"select * from  15_branch_type_management order by branch_type_name asc")or die(mysqli_error($con));
    while($row=mysqli_fetch_array($sql))
    {
      echo '<tr>
<td>'.$i.'</td>
<td>'.$row['branch_type_name'].'</td>
<td width="10%">
    <a class="btn btn-success" href="javascript:void(0)" data-id="'.$row['id'].'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
    <a class="btn btn-danger" href="delete.php?action=branch-type&id='.$row['id'].'"><i class="fa fa-trash" aria-hidden="true"></i></a>
    
    </td>
</tr>';
$i++;
}
?> 
</tr>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="post">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Branch Type Management</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Branch Type</label>
          <br>
          <input type="text"name="branch_type_name"class="form-control"required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="save" class="btn btn-primary">Save changes</button>
      </div>
    </div>
</form>
  </div>
</div>
<?php include('include/footer.php'); ?>>