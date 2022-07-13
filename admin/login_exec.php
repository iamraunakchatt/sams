<?php
  session_start();
//Database Configuration File
include('../config/webconfig.php');




//Genrating random number for salt



    // Getting username/ email and password
    $uname=$_POST['username'];
     $password=$_POST['password'];


    // Fetch stored password  from database on the basis of username/email 
    $sql ="SELECT username,password FROM 03_admin_tbl WHERE (username=:usname)";
    $query= $dbh -> prepare($sql);
    $query-> bindParam(':usname', $uname, PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
  if($query->rowCount() > 0)
  {
foreach ($results as $result) {
 $fetchpassword=$result->password;
 // hashing for stored password
   $storedpass= $fetchpassword;
}

echo $storedpass;
echo $password;
  // Verifying Post password againt stored password
   if($storedpass==$password){


    $_SESSION['SAMSAdminLogin']=$_POST['username'];



    


    echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
  }
else {


    echo "<script type='text/javascript'> document.location = 'login.php?status=passwordwrong'; </script>";

    

}

   }


  else{




    echo "<script type='text/javascript'> document.location = 'login.php?status=usernamewrong'; </script>";
  }

?>