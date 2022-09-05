<?php include ('inc/header.php'); ?>
<style>
    #map {
  height: 350px;
  width:100%;
}
.style2 {color: #990000}
</style>
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

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
		"SELECT * FROM 03_admin_tbl where id=2"
	   );
	   $statement->execute();
	   $result = $statement->fetchAll();
	   foreach($result as $row)
	   {


        
	 $statement1 = $connection->prepare(
		"SELECT * FROM 01_superadmin_tbl where id=2"
	   );
	   $statement1->execute();
	   $result1 = $statement1->fetchAll();
	   foreach($result1 as $row1)
	   {
        $propic=$row1["propic"];
       }
		?>
<form method="post" action="action/addadmin_action.php" enctype="multipart/form-data">
<div class="row">
<div class="col-sm-12">
<div class="form-group">
  <span class="style2">
  <label><strong>Company Name *</strong></label>
  </span>
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
  <span class="style2">
  <label><strong>Latitude</strong></label>
  </span>
<input class="form-control" placeholder="eg. 121.56" type="textr" value="<?php echo $row["latitude"]; ?>" required name="latitude">
</div>
</div>
<div class="col-sm-6">
<div class="form-group">
  <span class="style2">
  <label><strong>Longtitude</strong></label>
  </span>
<input class="form-control" placeholder="eg. 22.5" type="text" value="<?php echo $row["longitude"]; ?>" required name="lontitude">
</div>
</div>
</div>
<div class="row">
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
<div class="col-sm-12">
<div class="form-group">
<label>Radius in Meter <span style="font-size:12px;color:red">(Set Radius between <strong>5 Mtrs. - 500 Mtrs.</strong> Employees will able to to mark Attendace inside in set radius of office only.)</label>
<input class="form-control" placeholder="eg. 250" type="number" value="<?php echo $row["radius"]; ?>" required min="5" max="500" name="radius">
</div>
</div>


</div>
<div class="row">
<div class="col-sm-2">
<div class="form-group">
  <span class="style2">
  <label>Max Locations</label>
  </span>
<input class="form-control" placeholder="eg. 4" type="text" value="<?php echo $row["mlocation"]; ?>" name="mlocation" >
</div>
</div>
<div class="col-sm-2">
<div class="form-group">
<label><span class="style2">Max Employees</span></label>
<input class="form-control" placeholder="eg. 10" type="text" value="<?php echo $row["memployee"]; ?>" name="memployee">
</div>
</div>
<div class="col-sm-8">
<div class="form-group">
<label><span class="style2">Attendance Type</span></label>
<select class="select" name="atype[]" multiple id="atype">
<option <?php  if (str_contains($row["atype"], 'auto')) { echo 'selected="selected"';}  ?>   value="auto">Auto</option>
<option <?php  if (str_contains($row["atype"], 'face')) { echo 'selected="selected"';}  ?>  value="face">Face Recognition</option>
<option <?php  if (str_contains($row["atype"], 'finger')) { echo 'selected="selected"';}  ?>  value="finger">Finger Scan</option>
<option <?php  if (str_contains($row["atype"], 'manual')) { echo 'selected="selected"';}  ?>  value="manual">Manual</option>
<option <?php  if (str_contains($row["atype"], 'selfie')) { echo 'selected="selected"';}  ?>  value="selfie">Selfie</option>
</select>
</div>
</div>

<div class="col-sm-6">
<div class="form-group">
<label><span class="style2">Employees Attendance Mark by Admin </span>:</label>
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
<span class="onoffswitch-switch"></span></label>
</div>
</div>

<div class="col-sm-6">
<div class="form-group">
<label><span class="style2">App Auto Logout </span>:</label>
</div>
</div>

<div class="col-sm-2">
<div class="onoffswitch">
<input type="checkbox" name="auto_logout" class="onoffswitch-checkbox" id="switch_hraa"
<?php if($row["auto_logout"]=="yes"){
?>
checked value="yes"
<?php
}else{
?>
value="no"
<?php
} ?>
>
<label class="onoffswitch-label" for="switch_hraa">
<span class="onoffswitch-inner"></span>
<span class="onoffswitch-switch"></span></label>
</div>
</div>



<div class="col-sm-6">
<div class="form-group">
<label><span class="style2">Admin App License Valid From Date</span></label>
<span class="style2">
<input class="form-control" placeholder="eg. 5/28/2022" type="date" value="<?php echo $row["validfrom"]; ?>" name="validfrom">
</span></div>
</div>
<div class="col-sm-6">
<div class="form-group">
  <span class="style2">
  <label>Employee App License Valid Till Date</label>
  </span>
  <input class="form-control" placeholder="eg. 5/28/2022" type="date" value="<?php echo $row["validtill"]; ?>" name="validtill">
</div>
</div>
<div class="col-sm-8">
<div class="form-group">
<label><span class="style2">Upload Logo</span></label>
<input type="file" class="form-control" name="clogo" id="imgInp">
<input type="hidden" class="form-control" name="flogo" value="<?php echo $row["logo"]; ?>">
</div>
</div>
<div class="col-lg-4">
<label>&nbsp;</label>
<div class="img-thumbnail float-end"><img src="action/logo/<?php echo $row["logo"]; ?>" class="img-fluid" alt="" width="140" height="40" id="blah"></div>
</div>
<div class="col-sm-6">
<div class="form-group position-relative">
<label><span class="style2">Admin Email Address</span></label>
<input class="form-control" placeholder="Email Address" type="email" value="<?php echo $row["username"]; ?>"  name="email">
</div>
</div>
<div class="col-sm-6">
<div class="form-group position-relative">
<label><span class="style2">Admin Password</span></label>
<input class="form-control" placeholder="eg. 123456" type="password" value="<?php echo $row["password"]; ?>" id="txtPassword1" name="password">
<span class="fa fa-eye-slash" id="toggle-password1"></span></div>
</div>


<div class="col-sm-6">
<div class="form-group position-relative">
<label><span class="style2"><strong>Goolge Map API Key</strong></span></label>
<input class="form-control" placeholder="Goolge Map API Key" type="text" value="<?php echo $row["gmapapi"]; ?>"  name="gmapapi">
</div>
</div>
<div class="col-sm-6">
<div class="form-group position-relative">
  <span class="style2">
  <label><strong>Firebase API Key</strong></label>
  </span>
<input class="form-control" placeholder="Firebase API Key" type="text" value="<?php echo $row["fapi"]; ?>"  name="fapi">
</div>
</div>
<!-- <div class="col-sm-6">
<div class="form-group position-relative">
<label>Admin Confirm Change Password</label>
<input class="form-control" id="txtConfirmPassword1" placeholder="eg. 123456" type="password" value="<?php echo $row["password"]; ?>">
<span class="fa fa-eye-slash" id="toggle-password2"></span>
</div>
</div> -->
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
    const myLatLng = { lat: <?php echo $row["latitude"]; ?>, lng: <?php echo $row["longitude"]; ?> };
  const map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: <?php echo $row["latitude"]; ?>, lng: <?php echo $row["longitude"]; ?> },
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

<script>
  $('#atype').on('change', function() {
    var a=this.value
   
    if(a=="auto"){
      $('#switch_hra').removeAttr('checked');
    }else{
      <?php
      if($row["empattbyadmin"]=="yes"){
        ?>
$('#switch_hra').attr('checked','checked');
        <?php
      }
      ?>
    }
   //$('#switch_hra').bootstrapToggle('off', true);
    
});
</script>