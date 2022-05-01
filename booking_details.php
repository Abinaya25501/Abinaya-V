<?php
session_start();
include "db.php";
//  $ac_type=$_SESSION['ac_type'];
 $user_mail=$_SESSION['user_mail'];
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
                        <th>Booking Id</th>
                        <th>Package Name</th>
                        <th>Package Type</th>
                        <th>Package Price</th>
                        <th>From Date</th>
                        <th>To Date</th>
                        <th>Reg Date</th>
                        <th>Status</th>
                        <th>Action</th>

                    </tr>





                    <?php
        $sno=0;
        
            $result=mysqli_query($con,"select * from tblbooking where UserEmail='$user_mail'");
            while($row=$result->fetch_Assoc())
            {   
                $PackageId = $row['PackageId'];
                $status = $row['status'];
                $sno++;
                    echo '<form method="post" action="">
                    <tr>
                    <td>'.$sno.'</td>
                    <td>'.$row['BookingId'].'</td>';
            $result1 = mysqli_query($con,"select * from tbltourpackages where PackageId ='$PackageId' ");
            while($row1=$result1 -> fetch_assoc()){
            
                  echo' <td>'.$row1['PackageName'].'</td>
                    <td>'.$row1['PackageType'].'</td>
                    <td>'.$row1['PackagePrice'].'</td>';
            }
            
                  echo '  <td>'.$row['FromDate'].'</td>
                    <td>'.$row['ToDate'].'</td>
                    <td>'.$row['RegDate'].'</td>';

                  if($status == 0)
                  echo '<td>Pending</td>';
                  else if($status == 1)
                  echo '<td>Confirmed</td>';
                 else if($status == 2)
                  echo '<td>Rejected</td>';
                  else if($status == 3)
                  echo '<td>Cancelled</td>';

                  if($status == 0 || $status == 1){
                  echo '<td>
                  <form method="post" action="">
                  <button type="submit" name="cancel" class="btn btn-primary">Cancel</button>
                  <input type="text" name="b_id" value="'.$row['BookingId'].'" style="display:none;" />
                  </form>
                  
                  </td>';
                  }
                  else{
                    echo '<td>
                    Cancelled
                    </td>';
                  }
                   echo '</tr></form>';
            
        }
     
     if(isset($_POST['cancel']))
     {
         $b_id=$_POST['b_id'];
        
         
         mysqli_query($con,"update tblbooking set status = 3 where BookingId='$b_id'");

        //  echo '<script>alert('.$user_mail.')</script>';
         
         mail($user_mail,"TOURISM","You Requested Booking Id $b_id has been successfully cancelled");
         
         echo '<meta http-equiv="refresh" content="1;URL=booking_details.php">';
         
         echo '<script>alert("Cancelled");</script>';
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