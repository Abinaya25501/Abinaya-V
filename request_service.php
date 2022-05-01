<?php
session_start();
include "db.php";
 $ac_type=$_SESSION['ac_type'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="ScreenOrientation" content="autoRotate:disabled">
    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">
    <title>Travel</title>
    <link href="bootstrap-3.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <style>
    body {
        overflow-x: hidden;
        background-color: #fff;
    }

    .card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        max-width: 300px;
        margin: auto;
        text-align: center;
        font-family: arial;
    }

    .title {
        color: grey;
        font-size: 18px;
    }

    button {
        border: none;
        outline: 0;
        display: inline-block;
        padding: 8px;
        color: white;
        background-color: #000;
        text-align: center;
        cursor: pointer;
        width: 100%;
        font-size: 18px;
    }
    </style>
</head>

<body>

    <?php include "nav.php"; ?>
    <div class="container">
        <br>
        <div class="row">

            <br><br>
            <div class="table-responsive">
                <table class="table table-bordered">

                    <tr>
                        <th>SNO</th>
                        <th>VEHICLE NO</th>
                        <th>EMAIL</th>
                        <th>CONTACT NO</th>
                        <th>DATE</th>
                        <th>STATUS</th>

                    </tr>





                    <?php
        $sno=0;
        
            $result=mysqli_query($con,"select * from request where type='$ac_type'");
            while($row=$result->fetch_Assoc())
            {   
                $sno++;
                    echo '<form method="post" action="">
                    <tr>
                    <td>'.$sno.'</td>
                    <td>'.$row['vehicle_no'].'</td>
                    <td>'.$row['driver_email'].'</td>
                    <td>'.$row['driver_cno'].'</td>
                    <td>'.$row['date'].'</td>
                    <td><button type="submit" name="b" style="width:48%;background-color:green;">Accept</button>&nbsp;<button type="submit" name="b1" style="width:48%;background-color:red;">Reject</button></td>
                    <input type="text" name="t1" value="'.$row['driver_email'].'" style="display:none;">
                    <input type="text" name="t2" value="'.$row['sno'].'" style="display:none;">
                    </tr></form>';
            }
     
     if(isset($_POST['b']))
     {
         $email=$_POST['t1'];
         $id=$_POST['t2'];
         $login_email=$_SESSION['login_email'];
         $login_name=$_SESSION['login_name'];
         $login_cno=$_SESSION['login_cno'];
         
         mysqli_query($con,"delete from request where sno='$id'");
         
         mail($email,"ACCEPTED SERVICE","You Requested Service has been accepted by $login_name. Please Contact $login_cno");
         
         echo '<meta http-equiv="refresh" content="1;URL=request_service.php>';
         
         echo '<script>alert("Accepted");</script>';
     }
     if(isset($_POST['b1']))
     {
          $email=$_POST['t1'];
         $login_email=$_SESSION['login_email'];
         $login_name=$_SESSION['login_name'];
         $login_cno=$_SESSION['login_cno'];
         
          mysqli_query($con,"delete from request where sno='$id'");
         
         mail($email,"REJECTED SERVICE","You Requested Service has been rejected by $login_name. Please Contact $login_cno");
         
          echo '<meta http-equiv="refresh" content="1;URL=request_service.php>';
         
          echo '<script>alert("Rejected");</script>';
     }
            
        
    ?>

                </table>
            </div>

        </div>
        <script src="bootstrap-3.2.0/jquery.min.js"></script>
        <script src="bootstrap-3.2.0/dist/js/bootstrap.min.js"></script>



        <script src="bootstrap-3.2.0/jquery.min.js"></script>
        <script src="bootstrap-3.2.0/dist/js/bootstrap.min.js"></script>

    </div>


    <script>
    //            AUTOMATIC MAIL NOTIFICATION
    setInterval(function() {
        mail();
    }, 5000);

    function mail() {
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //      document.getElementById("text").innerHTML =this.responseText;
            }
        };
        xhttp.open("POST", "mail.php?tmp=1", true);
        xhttp.send();
    }
    </script>

</body>

</html>