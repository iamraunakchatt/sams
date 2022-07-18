
<!-- <script src="assets/js/jquery-3.6.0.min.js"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>



<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="assets/js/jquery.slimscroll.min.js"></script>

<!--<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/dataTables.bootstrap4.min.js"></script>-->

<script src="assets/js/app.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
<script>
    $(document).ready(function() {
    $('.datatable').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>
<script>
$(document).ready(function(){
  $("a").click(function(){
    var id = $(this).data("id");
    anchor_value=$('#anchor_value').val();
    $.ajax({
        url: 'ajax.php',
        type: 'get',
        dataType: 'JSON',
        data:{
            id:id,
            anchor_value:anchor_value,
        },
        success:function(result)
     {
        console.log(result);
       
       
        if(anchor_value=='department')
        {
        var name=result.departmenet_name;
        var id=result.id;
        $(".dep").val(name);
        $(".idvalue").val(id);
        $('#myModal').modal('show');
        }
        else if(anchor_value=='designation')
        {
            var name=result.designation_name;
            var id=result.id;
            $(".dep").val(name);
            $(".idvalue").val(id);
            $('#des').modal('show');
        }
        else if(anchor_value=='empmanagment')
        {
            var name=result.employee_name;
            var id=result.id;
            $(".dep").val(name);
            $(".idvalue").val(id);
            $('#emp').modal('show'); 
        }

        else if(anchor_value=='leave-management')
        {
            var name=result.leave_data;
            var id=result.id;
            $(".dep").val(name);

            $(".idvalue").val(id);
            $('#leave-manag').modal('show'); 
        }
        else if(anchor_value=='deactive_reason')
        {
            var name=result.deactive_reason;
            var id=result.id;
            $(".dep").val(name);

            $(".idvalue").val(id);
            $('#deactive_reason').modal('show'); 
        }
        else if(anchor_value=='public_holiday')
        {
            var name=result.ocassion;
            var date=result.datee;
            var id=result.id;
            $(".dep").val(name);
            $(".date_value").val(date);

            $(".idvalue").val(id);
            $('#public-holiday').modal('show'); 
        }
        else if(anchor_value=='user_type')
        {
            var name=result.user_type;
            var id=result.id;
            $(".dep").val(name);
           

            $(".idvalue").val(id);
            $('#usertype').modal('show'); 
        }
        else if(anchor_value=='shift')
        {
            var name=result.shift_name;
            var from_shift=result.from_shift;
            var to_from=result.to_from;
            var lunch=result.lunch;
            var to_lunch=result.to_lunch;
            var grace_period=result.grace_period;

            
            var id=result.id;
            $(".dep").val(name);
            $(".from").val(from_shift);
            $(".to").val(to_from);
            $(".lunch").val(lunch);
            $(".to_lunch").val(to_lunch);
            $(".grace").val(grace_period);
           

            $(".idvalue").val(id);
            $('#shift').modal('show'); 
        }
        
        
        
     }
    
    
    });

  });
});
</script>

<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="post" action="update.php">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Department Management</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Department </label>
          <br>
          <input type="hidden"name="id"class="form-control idvalue "required>
          <input type="hidden"name="name"value="department"class="form-control "required>
          <input type="text"name="deparment_name"class="form-control dep"required>
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


<div class="modal fade" id="des" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="post"action="update.php">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Designation Management</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Designation </label>
          <br>
          <input type="hidden"name="id"class="form-control idvalue "required>
          <input type="hidden"name="name"value="designation"class="form-control "required>
          <input type="text"name="designation_name"class="form-control dep"required>
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

<div class="modal fade" id="emp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="post" action="update.php">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Employee Type Management</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Employee </label>
          <br>
          <input type="hidden"name="id"class="form-control idvalue "required>
          <input type="hidden"name="name"value="employee_management"class="form-control "required>
          <input type="text"name="employee_name"class="form-control dep"required>
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


<!-- Modal -->
<div class="modal fade" id="leave-manag" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="post"action="update.php">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Leave Management</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Leave Type</label>
          <br>
          <input type="hidden"name="id"class="form-control idvalue "required>
          <input type="hidden"name="name"value="leave_management"class="form-control "required>
          <input type="text"name="leave"class="form-control dep"required>
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


<div class="modal fade" id="deactive_reason" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="post"action="update.php">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Deactive Reason</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Deactive Reason </label>
          <br>
          <input type="hidden"name="id"class="form-control idvalue "required>
           <input type="hidden"name="name"value="deactive_reason"class="form-control "required>
          <input type="text"name="deactive_reason"class="form-control dep"required>
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


<div class="modal fade" id="public-holiday" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="post"action="update.php">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Leave Management</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Date</label>
          <br>
          <input type="date"name="date"class="form-control date_value"required>
        </div>
        <div class="form-group">
          <label>Ocassion</label>
          <br>
          <input type="hidden"name="id"class="form-control idvalue "required>
           <input type="hidden"name="name"value="public_holiday"class="form-control "required>
          <input type="text"name="ocassion"class="form-control dep"required>
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

<div class="modal fade" id="usertype" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="post"action="update.php">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">User Tyoe</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>User Type</label>
          <br>
          <input type="hidden"name="id"class="form-control idvalue "required>
           <input type="hidden"name="name"value="user_type"class="form-control "required>
          <input type="text"name="user_type"class="form-control dep"required>
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

<!-- Modal -->
<div class="modal fade" id="shift" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="post"action="update.php">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Shift Management</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Shift Name</label>
          <br>
          <input type="text"name="shift_name"class="form-control dep"required>
        </div>
        <div class="form-group">
          <label>From</label>
          <br>
          <input type="text"name="from"class="form-control from"required>
        </div>
        <div class="form-group">
          <label>To</label>
          <br>
          <input type="text"name="to_from"class="form-control to"required>
        </div>
        <div class="form-group">
          <label>Lunch</label>
          <br>
          <input type="text"name="lunch"class="form-control lunch"required>
        </div>
        <div class="form-group">
          <label>To</label>
          <br>
          <input type="text"name="to_lunch"class="form-control to_lunch"required>
        </div>
        <div class="form-group">
        <input type="hidden"name="id"class="form-control idvalue "required>
           <input type="hidden"name="name"value="grace_period"class="form-control "required>
          <label>Grace Period</label>
          <br>
          <input type="text"name="grace_period"class="form-control grace"required>
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



<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
@$status=$_GET['status'];
if($status=="success"){
?>
<script>
    Swal.fire({
  icon: 'success',
  title: 'Congratulations',
  text: 'Successfully Submitted',
})
</script>
<?php
}else if($status=="failed"){
  ?>
<script>
    Swal.fire({
  icon: 'error',
  title: 'Oops!!',
  text: 'An Error Occured!',
})
</script>
  <?php
}else if($status=="editsuccess"){
  ?>
<script>
    Swal.fire({
  icon: 'success',
  title: 'Congratulations!!',
  text: 'Successfully Updated',
})
</script>
  <?php
}else if($status=="deletesuccess"){
  ?>
<script>
    Swal.fire({
  icon: 'success',
  title: 'Congratulations!!',
  text: 'Successfully Deleted',
})
</script>
  <?php
}
?>
?>

</body>
</html>