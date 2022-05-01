<?php
session_start();
error_reporting(0);
include('admin/includes/config.php');
include "db.php";
$user_mail = $_SESSION['user_mail'];
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
    .text {
        background-color: transparent;
        outline-style: none;
        border-top: none;
        border-right: none;
        border-left: none;
        outline: none;
        border-bottom: solid 1px;
        padding: 3px 10px;
        border-radius: 0;

        -webkit-box-shadow: none;
        box-shadow: none;
    }

    .text:focus {
        -webkit-box-shadow: none;
        box-shadow: none;
    }
    </style>

</head>

<body>
    <?php include "nav.php"; ?>

    <div class="container-fluid">


        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <div class="panel panel-warning">
                    <div class="panel-heading" style="background-color:#FFA500;">
                        <h3 class="panel-title">POST ISSUES</h3>
                    </div>
                    <div class="panel-body" style="border:1px solid #FFA500;border-top:0;">

                        <form class="form-horizontal" role="form" method="post" action="">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Title</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputEmail3" placeholder="Title"
                                        name="title">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" rows="3" name="des"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary" name="post">Submit</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>


    <?php
      
      if(isset($_POST['post']))
      {
          
          $title=$_POST['title'];
          $des=$_POST['des'];
          
          
          
           date_default_timezone_set('Asia/Kolkata');
            $date=date('Y-m-d h:i:s A');    

            $status=0;
            $sql="INSERT INTO tblissues(UserEmail,Issue,Description) VALUES(:useremail,:title,:des)";
            $query = $dbh->prepare($sql);
            $query->bindParam(':useremail',$user_mail,PDO::PARAM_STR);
            $query->bindParam(':title',$title,PDO::PARAM_STR);
            $query->bindParam(':des',$des,PDO::PARAM_STR);
            $query->execute();
            $lastInsertId = $dbh->lastInsertId();
            if($lastInsertId)
            {
            $msg="Successfully Issue Posted";
            }
            else 
            {
            $error="Something went wrong. Please try again";
            }
            
        //   mail($email,"REQUEST SERVICE","Vehicle No $vehicle_no Request Your Service. Please Contact $driver_cno");
          
          echo '<script>alert("Successfully Issue Posted");</script>';
      }
         
      ?>






    <script src="bootstrap-3.2.0/jquery.min.js"></script>
    <script src="bootstrap-3.2.0/dist/js/bootstrap.min.js"></script>






</body>

</html>