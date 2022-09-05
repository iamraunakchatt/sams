

<?php include('include/header.php'); 
  include('../config/webconfig.php');
  session_start();
  $id = $_GET['id']; 
  $sql = "select * from   12_branch_management where id='".$id."'"; 
  $result = mysqli_query($conn,$sql); 
  $data=mysqli_fetch_array($result); 
  $vbranch=$data['branch_type'];
  $vbranch_name=$data['branch_name'];
  $vaddress_1=$data['address_1'];
  $vaddress_2=$data['address_2'];
  $vcity=$data['city'];
  $vpincode=$data['pincode'];
  $vcontact_no=$data['contact_no'];
  $vuser_type=$data['user_type'];
  $vattendance_type=$data['attendance_type'];
  $vlatitude=$data['latitude'];
  $vlongtitude=$data['longtitude'];
  $vradius_meter=$data['radius_meter'];

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
    
    $sql = "select * from  12_branch_management  where id='".$id."'"; 
    $result = mysqli_query($conn,$sql); 
    $data=mysqli_fetch_array($result); 
    $vshift=$data['branch_name'];
   
    if($branch_name==$vshift)
    {
      $sql ="UPDATE  12_branch_management SET branch_type='".$branch_type."',branch_name='".$branch_name."',address_1='".$address_1."',address_2='".$address_2."',city='".$city."',pincode='".$pincode."',contact_no='".$contact_number."',attendance_type='".$attendance_type."',user_type='".$user_type."',latitude='".$latitudes."',longtitude='".$longitude."',radius_meter='".$radius_meter."' where id='".$id."'"; 
   
      // mysqli_query($conn,$sql);
     
  
      if(mysqli_query($conn, $sql)){
         
          
          header("Location: branch-managment.php?status=success");    
                 
      } else{
          header("Location: branch-managment.php?status=failed");  
      }
    }
    else
    {
           
    $strlower = strtolower($branch_name);
    $i=1;
    $sql=mysqli_query($conn,"select * from 12_branch_management order by id asc")or die(mysqli_error($con));
    while($row=mysqli_fetch_array($sql))
    {
            $department=$row['branch_name'];
            $depstrlower=strtolower($department);
            if($depstrlower==$strlower)
            {
              $equal=1;
              $_SESSION["favcolor"] = "abc";
              break;
            }
    $i++;      
    }
   
    if($equal==1)
    {
      header("location: edit-branch-management.php?id=1&status=branch-name");
    }

    else{

        
    $sql ="UPDATE  12_branch_management SET branch_type='".$branch_type."',branch_name='".$branch_name."',address_1='".$address_1."',address_2='".$address_2."',city='".$city."',pincode='".$pincode."',contact_no='".$contact_number."',attendance_type='".$attendance_type."',user_type='".$user_type."',latitude='".$latitudes."',longtitude='".$longitude."',radius_meter='".$radius_meter."' where id='".$id."'"; 
   
    // mysqli_query($conn,$sql);
   

    if(mysqli_query($conn, $sql)){
       
        
        header("Location: branch-managment.php?status=success");    
               
    } else{
        header("Location: branch-managment.php?status=failed");  
    } 

  }
  }
}
?>
<style>
    #map {
  height: 350px;
  width:100%;
}
</style>
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<div class="page-wrapper">
<div class="content container-fluid">

<div class="page-header">
<div class="row">
<div class="col">
<h3 class="page-title"></h3>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="#">Home</a></li>
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
		<h4 class="card-title mb-0">Edit Branch </h4>

		</div>
		
	</div>


</div>
<div class="card-body">
<div class="table-responsive">
<input type="hidden"value="branch"id="anchor_value">

<form method="post">
    
        <div class="form-group">
          <label>Branch Type</label>
          <br>
          <select name="branch_type"class="form-control"required>
          <?php
            $i=1;
            $sql=mysqli_query($conn,"select * from  15_branch_type_management order by branch_type_name asc")or die(mysqli_error($con));
            while($row=mysqli_fetch_array($sql))
            {
                $branch_type_name=$row['branch_type_name'];
                $branchtypeid=$row['id'];
                echo'<option value="'.$branchtypeid.'"';if ($branchtypeid==$vbranch){echo 'selected';}echo '>'.$branch_type_name.'</option>';
            }
          ?>
            </select>
        </div>
        <div class="form-group">
          <label>Branch Name</label>
          <br>
          <input type="text"name="branch_name"value="<?php echo $vbranch_name; ?>"class="form-control"required>
        </div>
        <div class="form-group">
          <label>Address1</label>
          <br>
          <input type="text"name="address_1"value="<?php echo $vaddress_1;?>"class="form-control"required>
        </div>
        <div class="form-group">
          <label>Address2</label>
          <br>
          <input type="text"name="address_2"value="<?php echo $vaddress_2;?>"class="form-control"required>
        </div>
        <div class="form-group">
          <label>City</label>
          <br>
          <input type="text"name="city"value="<?php echo $vcity;?>"class="form-control"required>
        </div>
        <div class="form-group">
          <label>Pincode</label>
          <br>
          <input type="text"name="pincode"value="<?php echo $vpincode;?>"class="form-control"required>
        </div>
        <div class="form-group">
          <label>Contact Number</label>
          <br>
          <input type="text"name="contact_number"value="<?php echo $vcontact_no;?>"class="form-control"required>
        </div>
        <div class="form-group">
          <label>User Type</label>
          <br>
          <select name="user_type"class="form-control"required>
             
              <?php
    $i=1;
    $sql=mysqli_query($conn,"select * from  10_user_type order by user_type asc")or die(mysqli_error($con));
    while($row=mysqli_fetch_array($sql))
    {
        $user_type=$row['user_type'];
        $usertypeid=$row['id'];
        echo'<option value="'.$usertypeid.'"';if ($usertypeid==$vuser_type){echo 'selected';}echo '>'.$user_type.'</option>';
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
<option <?php  if (str_contains($row["atype"], 'auto')) { echo 'selected="selected"';}  ?>   value="auto">Auto</option>
<option <?php  if (str_contains($row["atype"], 'manual')) { echo 'selected="selected"';}  ?>  value="manual">Manual</option>
<option <?php  if (str_contains($row["atype"], 'selfie')) { echo 'selected="selected"';}  ?>  value="selfie">Selfie</option>
<option <?php  if (str_contains($row["atype"], 'face')) { echo 'selected="selected"';}  ?>  value="face">Face Recognition</option>
<option <?php  if (str_contains($row["atype"], 'finger')) { echo 'selected="selected"';}  ?>  value="finger">Finger Scan</option>

</select>
</div>
<?php
           }
           ?>
      <div class="form-group">
          <label>Latitudes</label>
          <br>
          <input type="text"name="latitudes"value="<?php echo $vlatitude ?>"class="form-control"required id="lat">
        </div>
        <div class="form-group">
          <label>Longitude</label>
          <br>
          <input type="text"name="longitude"value="<?php echo $vlongtitude ?>"class="form-control"required  id="lng">
        </div>
        <div class="col-sm-12">
<input
      id="pac-input"
      class="form-control"
      type="text"
      placeholder="Search Box" style="margin-top:8px"
    />
</div>
<div class="col-sm-12">
<div id="map"></div>
</div>
        <div class="form-group">
          <label>Radius in Meter</label>
          <br>
          <input type="text"name="radius_meter"value="<?php echo $vradius_meter ?>"class="form-control"required>
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
<script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCxp7tH5i5ATJdKgoFOWyXXb6wt0z_a7TQ&callback=initAutocomplete&libraries=places&v=weekly"
      defer
    ></script>
    <script>
      /**
 * @license
 * Copyright 2019 Google LLC. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */
// @ts-nocheck TODO remove when fixed
// This example adds a search box to a map, using the Google Place Autocomplete
// feature. People can enter geographical searches. The search box will return a
// pick list containing a mix of places and predicted search terms.
// This example requires the Places library. Include the libraries=places
// parameter when you first load the API. For example:
// <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
function initAutocomplete() {
    const myLatLng = { lat: <?php echo $vlatitude; ?>, lng: <?php echo $vlongtitude; ?> };
  const map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: <?php echo $vlatitude; ?>, lng: <?php echo $vlongtitude; ?> },
    zoom: 16,
    mapTypeId: "roadmap",
    
  });
  new google.maps.Marker({
    position: myLatLng,
    map,
    title: "Hello World!",
  });
  // Create the search box and link it to the UI element.
  const input = document.getElementById("pac-input");
  const searchBox = new google.maps.places.SearchBox(input);

  map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
  // Bias the SearchBox results towards current map's viewport.
  map.addListener("bounds_changed", () => {
    searchBox.setBounds(map.getBounds());
  });

  let markers = [];

  // Listen for the event fired when the user selects a prediction and retrieve
  // more details for that place.
  searchBox.addListener("places_changed", () => {
    const places = searchBox.getPlaces();

    if (places.length == 0) {
      return;
    }

    // Clear out the old markers.
    markers.forEach((marker) => {
      marker.setMap(null);
    });
    markers = [];

    // For each place, get the icon, name and location.
    const bounds = new google.maps.LatLngBounds();

    places.forEach((place) => {
      if (!place.geometry || !place.geometry.location) {
        console.log("Returned place contains no geometry");
        return;
      }

      const icon = {
        url: 'https://nagstake.com/Map-Marker-PNG-HD.png',
        size: new google.maps.Size(71, 71),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(17, 34),
        scaledSize: new google.maps.Size(25, 25),
      };

      // Create a marker for each place.
      markers.push(
        new google.maps.Marker({
          map,
          icon,
          title: place.name,
          position: place.geometry.location,
        })
      );
      if (place.geometry.viewport) {
   
       
        // Only geocodes have viewport.
        bounds.union(place.geometry.viewport);
        document.getElementById("lat").value = place.geometry.location.lat();
        document.getElementById("lng").value = place.geometry.location.lng();
      } else {
        bounds.extend(place.geometry.location);
      }
    });
    map.fitBounds(bounds);
  });
}

window.initAutocomplete = initAutocomplete;

    </script>

<?php include('include/footer.php'); ?>