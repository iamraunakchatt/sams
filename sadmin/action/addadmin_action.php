<?php

include('../../config/webconfig.php');
function upload_image2()
{
 if(isset($_FILES["clogo"]))
 {
  $extension = explode('.', $_FILES['clogo']['name']);
  $new_name = date('m-d-Y_H_i_s').rand() . '.' . $extension[1];
  $destination = 'logo/' . $new_name;
  move_uploaded_file($_FILES['clogo']['tmp_name'], $destination);
  return $new_name;
 }
}

$image = '';
if($_FILES["clogo"]["name"] != '')
{
 $image = upload_image2();
}else{
  $image=$_POST["flogo"];
}

if(isset($_POST["onoffswitch"])){
  $onoffswitch="yes";
}else{
  $onoffswitch="no";
}

if(isset($_POST["auto_logout"])){
  $auto_logout="yes";
}else{
  $auto_logout="no";
}

$statement = $connection->prepare(
    "UPDATE `03_admin_tbl` SET `cname`=:cname,`address1`=:address1,`address2`=:address2,`city`=:city,`zipcode`=:zipcode,`latitude`=:latitude,`longitude`=:lontitude,`radius`=:radius,`logo`='$image',`mlocation`=:mlocation,`memployee`=:memployee,`atype`=:atype,`empattbyadmin`=:empattbyadmin,`validfrom`=:validfrom,`validtill`=:validtill,`password`=:password,`update_dt`=NOW(),`update_ip`=:update_ip,`auto_logout`=:auto_logout,`username`=:username,`gmapapi`=:gmapapi,`fapi`=:fapi WHERE
    id=2"
   );

   $result = $statement->execute(
    array(
     ':cname' => $_POST["cname"],
     ':address1' => $_POST["address1"],
     ':address2' => $_POST["address2"],
     ':city' => $_POST["city"],
     ':zipcode' => $_POST["zipcode"],
     ':latitude' => $_POST["latitude"],
     ':lontitude' => $_POST["lontitude"],
     ':radius' => $_POST["radius"],
     ':mlocation' => $_POST["mlocation"],
     ':memployee' => $_POST["memployee"],
     ':atype' => implode(',', $_POST["atype"]),
     ':empattbyadmin' => $onoffswitch,
     ':validfrom' => $_POST["validfrom"],
     ':validtill' => $_POST["validtill"],
     ':password' => $_POST["password"],
     ':update_ip' => $_SERVER['REMOTE_ADDR'],
     ':username' => $_POST['email'],
     ':auto_logout' => $auto_logout,
     ':gmapapi' => $_POST['gmapapi'],
     ':fapi' => $_POST['fapi'],
    )
   );


   $statement1 = $connection->prepare(
    "UPDATE `03_admin_tbl` SET `cname`=:cname,`address1`=:address1,`address2`=:address2,`city`=:city,`zipcode`=:zipcode,`latitude`=:latitude,`longitude`=:lontitude,`radius`=:radius,`logo`='$image',`mlocation`=:mlocation,`memployee`=:memployee,`atype`=:atype,`empattbyadmin`=:empattbyadmin,`validfrom`=:validfrom,`validtill`=:validtill,`update_dt`=NOW(),`update_ip`=:update_ip,`auto_logout`=:auto_logout,`gmapapi`=:gmapapi,`fapi`=:fapi WHERE
    id=1"
   );

   $result1 = $statement1->execute(
    array(
     ':cname' => $_POST["cname"],
     ':address1' => $_POST["address1"],
     ':address2' => $_POST["address2"],
     ':city' => $_POST["city"],
     ':zipcode' => $_POST["zipcode"],
     ':latitude' => $_POST["latitude"],
     ':lontitude' => $_POST["lontitude"],
     ':radius' => $_POST["radius"],
     ':mlocation' => $_POST["mlocation"],
     ':memployee' => $_POST["memployee"],
     ':atype' => implode(',', $_POST["atype"]),
     ':empattbyadmin' => $onoffswitch,
     ':validfrom' => $_POST["validfrom"],
     ':validtill' => $_POST["validtill"],
     ':update_ip' => $_SERVER['REMOTE_ADDR'],
     ':auto_logout' => $auto_logout,
     ':gmapapi' => $_POST['gmapapi'],
     ':fapi' => $_POST['fapi'],
    )
   );






   if(!empty($result))
   {
    echo "<script type='text/javascript'> document.location = '../index.php?status=success'; </script>";
   }

?>