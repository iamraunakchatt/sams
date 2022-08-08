<?php 
  include('../config/webconfig.php');

  if (isset($_POST['save']))
  {
      if(isset($_POST['check']))
      {
            $mysqli = new mysqli("localhost", "root", "", "sams_db");
    
            if ($mysqli == false) {
                die("ERROR: Could not connect. ".$mysqli->connect_error);
            }
            $sql = "INSERT INTO 09_public_holiday_ocassion(ocassion,datee,holiday_id) 
                    VALUES('Sunday-1st-Jan','1/2/2022','1'),
                            ('Sunday-2nd-Jan ','1/9/2022','1'),
                            ('Sunday-3rd-Jan','1/16/2022','1'),
                            ('Sunday-4th-Jan','1/23/2022','1'),
                            ('Sunday-5th-Jan','1/30/2022','1'),
                            ('Sunday-1st-Feb','2/6/2022','1'),
                            ('Sunday-2nd-Feb','2/13/2022','1'),
                            ('Sunday-3rd-Feb','2/20/2022','1'),
                            ('Sunday-4th-Feb','2/27/2022','1'),
                            ('Sunday-1st-Mar','3/6/2022','1'),
                            ('Sunday-2nd-Mar','3/13/2022','1'),
                            ('Sunday-3rd-Mar','3/20/2022','1'),
                            ('Sunday-4th-Mar','3/27/2022','1'),
                            ('Sunday-1st-Apr','4/3/2022','1'),
                            ('Sunday-2nd-Apr','4/10/2022','1'),
                            ('Sunday-3rd-Apr','4/17/2022','1'),
                            ('Sunday-4th-Apr','4/24/2022','1'),
                            ('Sunday-1st-May','5/1/2022','1'),
                            ('Sunday-2nd-May','5/8/2022','1'),
                            ('Sunday-3rd-May','5/15/2022','1'),
                            ('Sunday-4th-May','5/22/2022','1'),
                            ('Sunday-5th-May','5/29/2022','1'),
                            ('Sunday-1st-Jun','6/5/2022','1'),
                            ('Sunday-2nd-Jun','6/12/2022','1'),
                            ('Sunday-3rd-Jun','6/19/2022','1'),
                            ('Sunday-4th-Jun','6/26/2022','1'),
                            ('Sunday-1st-Jul','7/3/2022','1'),
                            ('Sunday-2nd-Jul','7/10/2022','1'),
                            ('Sunday-3rd-Jul','7/17/2022','1'),
                            ('Sunday-4th-Jul','7/24/2022','1'),
                            ('Sunday-5th-Jul','7/31/2022','1'),
                            ('Sunday-1st-Aug','8/7/2022','1'),
                            ('Sunday-2nd-Aug','8/14/2022','1'),
                            ('Sunday-3rd-Aug','8/21/2022','1'),
                            ('Sunday-4th-Aug','8/28/2022','1'),
                            ('Sunday-1st-Sep','9/4/2022','1'),
                            ('Sunday-2nd-Sep','9/11/2022','1'),
                            ('Sunday-3rd-Sep','9/18/2022','1'),
                            ('Sunday-4th-Sep','9/25/2022','1'),
                            ('Sunday-1st-Oct','10/2/2022','1'),
                            ('Sunday-2nd-Oct','10/9/2022','1'),
                            ('Sunday-3rd-Oct','10/16/2022','1'),
                            ('Sunday-4th-Oct','10/23/2022','1'),
                            ('Sunday-5th-Oct','10/30/2022','1'),
                            ('Sunday-1st-Nov','11/6/2022','1'),
                            ('Sunday-2nd-Nov','11/13/2022','1'),
                            ('Sunday-3rd-Nov','11/20/2022','1'),
                            ('Sunday-4th-Nov','11/27/2022','1'),
                            ('Sunday-1st-Dec','12/4/2022','1'),
                            ('Sunday-2nd-Dec','12/11/2022','1'),
                            ('Sunday-3rd-Dec','12/18/2022','1'),
                            ('Sunday-4th-Dec','12/25/2022','1')";
                           if ($mysqli->query($sql) ==  true)
                            {
                                header("Location: public-holiday-managment.php?status=success");    
                            }
                            else
                            {
                                echo "ERROR: Could not able to execute $sql. "
                                    .$mysqli->error;
                            }
            
                       $mysqli->close();
      }
      else
      {
                  $sql ="delete from  09_public_holiday_ocassion where holiday_id='1'"; 
        
               if(mysqli_query($conn, $sql)){
                   
                    header("Location: public-holiday-managment.php?status=deletesuccess");    
                        
                } else{
                    echo "ERROR: Data! Not Update $sql. "
                        . mysqli_error($conn);
                } 
      }
  }
  else
  {

  }

?>