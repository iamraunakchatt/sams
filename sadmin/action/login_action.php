<?php
  session_start();
//Database Configuration File
include('../../config/webconfig.php');




//Genrating random number for salt
if(@$_SESSION['randnmbr']==""){
   
        $Alpha22=range("A","Z");
        $Alpha12=range("A","Z"); 
        $alpha22=range("a","z");
        $alpha12=range("a","z");
        $num22=range(1000,9999);
        $num12=range(1000,9999);
        $numU22=range(99999,10000);
        $numU12=range(99999,10000);
        $AlphaB22=array_rand($Alpha22);
        $AlphaB12=array_rand($Alpha12);
        $alphaS22=array_rand($alpha22);
        $alphaS12=array_rand($alpha12);
        $Num22=array_rand($num22);
        $NumU22=array_rand($numU22);
        $Num12=array_rand($num12);
        $NumU12=array_rand($numU12);
        $res22=$Alpha22[$AlphaB22].$num22[$Num22].$Alpha12[$AlphaB12].$numU22[$NumU22].$alpha22[$alphaS22].$num12[$Num12];
        $text22=str_shuffle($res22);
         $_SESSION['randnum']= $text22;
} 

// Generate token
function getToken($length){
  $token = "";
  $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
  $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
  $codeAlphabet.= "0123456789";
  $max = strlen($codeAlphabet); // edited

  for ($i=0; $i < $length; $i++) {
    $token .= $codeAlphabet[random_int(0, $max-1)];
  }

  return $token;
}
    // Getting username/ email and password
    $uname=$_POST['username'];
     $password=hash('sha256',$_POST['password']);

     // Hashing with Random Number
     $saltedpasswrd=hash('sha256',$password.$_SESSION['randnum']);
    // Fetch stored password  from database on the basis of username/email 
    $sql ="SELECT username,password FROM 01_superadmin_tbl WHERE (username=:usname)";
    $query= $dbh -> prepare($sql);
    $query-> bindParam(':usname', $uname, PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
  if($query->rowCount() > 0)
  {
foreach ($results as $result) {
 $fetchpassword=$result->password;
 // hashing for stored password
   $storedpass= hash('sha256',$fetchpassword.$_SESSION['randnum']);
}
//You can configure your cost value according to your server configuration.By Default value is 10.
  $options = [
              'cost' => 12,
              ];
  // Hashing of the post password
  $hash= password_hash($saltedpasswrd,PASSWORD_DEFAULT, $options);
  // Verifying Post password againt stored password
   if(password_verify($storedpass,$hash)){


    $_SESSION['SAMSSuperadminLogin']=$_POST['username'];


    $statement = $connection->prepare("INSERT INTO `02_superadminloginhistory_tbl`(`login_dt`, `login_ip`, `login_status`) VALUES (NOW(),:login_ip,'Success')
    ");
    $result = $statement->execute(
     array(

      ':login_ip' => $_SERVER['REMOTE_ADDR']
     )
    );
    $token = getToken(10);
    $_SESSION['token'] = $token;

    $statement = $connection->prepare("INSERT INTO `14_superadmin_token`(`username`, `token`) VALUES (:username,:token)
    ");
    $result = $statement->execute(
     array(

      ':username' => $_POST['username'],
      ':token' =>$token
     )
    );
    


    echo "<script type='text/javascript'> document.location = '../'; </script>";
  }
else {


    $statement = $connection->prepare("INSERT INTO `02_superadminloginhistory_tbl`(`login_dt`, `login_ip`, `login_status`) VALUES (NOW(),:login_ip,'Failure due to wrong password used')
    ");
    $result = $statement->execute(
     array(

      ':login_ip' => $_SERVER['REMOTE_ADDR']
     )
    );

    echo "<script type='text/javascript'> document.location = '../login.php?status=passwordwrong'; </script>";

    

}

   }


  else{

    $statement = $connection->prepare("INSERT INTO `02_superadminloginhistory_tbl`(`login_dt`, `login_ip`, `login_status`) VALUES (NOW(),:login_ip,'Failure due to wrong username used')
    ");
    $result = $statement->execute(
     array(

      ':login_ip' => $_SERVER['REMOTE_ADDR']
     )
    );


    echo "<script type='text/javascript'> document.location = '../login.php?status=usernamewrong'; </script>";
  }

?>