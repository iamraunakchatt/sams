<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reset Super Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>
      <div class="container">
          <div class="row">
              <div class="col-md-4"></div>
                  
              <div class="col-md-4">
                  
                  <form style="margin-top:20%" method="post" action="reset_action.php">
                      
                      <?php
                      @$status=$_GET['status'];
                      if($status=="deletesuccess"){
                       ?>
                       <div class="alert alert-success" role="alert">
  Successfully Resetted
</div>
                       
                       <?php
                      }else if($status=="deletefailed"){
                        ?>
                       
                       <div class="alert alert-warning" role="alert">
  Reset Failed
</div>
                       <?php  
                      }else if($status=="wrongcode"){
                        ?>
                       
                       <div class="alert alert-danger" role="alert">
  Wrong Code
</div>
                       <?php  
                      }
                      
                      ?>
                      
                      


                      
                      
                      <center><h4>Reset Super Admin Login Token</h4></center>
  <!-- Name input -->
  <div class="form-outline mb-4">
    <input type="text" id="form4Example1" class="form-control" placeholder="Code" required name="code"/>
  </div>

  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-4" style="width:100%">Submit</button>
</form>
              </div>
              <div class="col-md-4"></div>
          </div>
      </div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>

