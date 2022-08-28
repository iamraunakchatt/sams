<?php include ('include/header.php'); ?>
<style>
    #map {
  height: 350px;
  width:100%;
}
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
		"SELECT * FROM 03_admin_tbl ORDER BY id DESC LIMIT 1"
	   );
	   $statement->execute();
	   $result = $statement->fetchAll();
	   foreach($result as $row)
	   {


        
	 $statement1 = $connection->prepare(
		"SELECT * FROM 01_superadmin_tbl ORDER BY id DESC LIMIT 1"
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
<label>Company Name <span class="text-danger">*</span></label>
<input class="form-control" type="text" placeholder="eg. Dreamguy's Technologies" value="<?php echo $row["cname"]; ?>" name="cname" required disabled>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-6">
<div class="form-group">
<label>Address 1</label>
<input class="form-control " placeholder="eg. 3864 Quiet Valley Lane" type="text" value="<?php echo $row["address1"]; ?>" name="address1" required disabled>
</div>
</div>
<div class="col-sm-6">
<div class="form-group">
<label>Address 2</label>
<input class="form-control " placeholder="eg. Sherman Oaks, CA, 91403" type="text" value="<?php echo $row["address2"]; ?>" name="address2" disabled>
</div>
</div>
<div class="col-sm-6 col-md-6 col-lg-6">
<div class="form-group">
<label>City</label>
<input class="form-control" placeholder="eg. Oaks" type="text" value="<?php echo $row["city"]; ?>" name="city" required disabled>
</div>
</div>
<div class="col-sm-6 col-md-6 col-lg-6">
<div class="form-group">
<label>Postal Code</label>
<input class="form-control" placeholder="eg. 91403" type="text" value="<?php echo $row["zipcode"]; ?>" name="zipcode" required disabled>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-6">
<div class="form-group">
<label>Latitude</label>
<input class="form-control" placeholder="eg. 121.56" type="textr" value="<?php echo $row["latitude"]; ?>" required name="latitude" disabled>
</div>
</div>
<div class="col-sm-6">
<div class="form-group">
<label>Longtitude</label>
<input class="form-control" placeholder="eg. 22.5" type="text" value="<?php echo $row["longitude"]; ?>" required name="lontitude" disabled>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-12">
<div class="form-group">
<label>Radius in Meter <span style="font-size:12px;color:red">(Set Radius between 100m - 500m.By setting radus, employees can mark attendace inside in this set radis only.)</label>
<input class="form-control" placeholder="eg. 250" type="number" value="<?php echo $row["radius"]; ?>" required min="100" max="500" name="radius" disabled>
</div>
</div>

<div class="col-sm-12">
<div id="map"></div>
</div>

</div>
<div class="row">
<div class="col-sm-12">
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
</div>


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


<?php include ('include/footer.php'); ?>

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