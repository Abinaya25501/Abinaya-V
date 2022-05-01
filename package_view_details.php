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
    <title>TRAVEL</title>
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

    .card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        max-width: 300px;
        margin: auto;
        text-align: center;
        font-family: arial;
        padding: 5px;
        margin-bottom: 15px;
    }

    .title {
        margin: 2px;
        margin-top: 0;
        color: #fff;
    }
    </style>

</head>

<body>
    <?php include "nav.php"; ?>

    <div class="container-fluid">


        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-warning">
                    <div class="panel-heading" style="background-color:#FFA500;">
                        <h3 class="panel-title">PACKAGE DETAILs</h3>
                    </div>
                    <div class="panel-body" style="border:1px solid #FFA500;border-top:0;">

                        <form class="form-horizontal" role="form" method="post" action="" enctype="multipart/form-data">
                            <?php
$id=$_GET['id'];
$result=mysqli_query($con,"select * from tbltourpackages where PackageId='$id'");
while($row=$result->fetch_assoc())
{
   $pprice =$row['PackagePrice'];
   $pprice1 =$row['PackagePrice1'];
   $pprice2 =$row['PackagePrice2'];
    
?>


                            <div class="row">
                                <div class="col-md-4">
                                    <img src="admin/pacakgeimages/<?php echo $row['PackageImage'];?>"
                                        class="img-responsive" alt="" />
                                </div>

                                <div class="col-md-7">
                                    <h1><?php echo $row['PackageName'];?></h1>
                                    <h5><b>PACKAGE TYPE : </b><?php echo $row['PackageType'];?></h5>
                                    <h5><b>PACKAGE FEATURES : </b><?php echo $row['PackageFetures'];?></h5>
                                    <h5><b>PACKAGE LOCATION : </b><?php echo $row['PackageLocation'];?></h5>
                                    <p><b>PACKAGE DETAILS : </b><?php echo $row['PackageDetails'];?></p>
                                    <!-- <h2 style="color:green;"><b>PRICE : <?php echo $row['PackagePrice'];?></b></h2> -->

                                    <div class="row">
                                        <div class="col-md-4">

                                            <div class="card"
                                                style="background: linear-gradient(to top right, #00cc00 0%, #339933 100%);">
                                                <div class="title">
                                                    <h5><b>LOW FEATURES</b></h5>
                                                    <hr />
                                                </div>
                                                <h4 style="color:#e1e1e1;"><b>PRICE :
                                                        <?php echo $row['PackagePrice']."/-";?></b></h4>
                                                <p style="color:#fff;"><b>FEATURES :
                                                    </b><?php echo $row['PackageLevel0'];?></p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card"
                                                style="background: linear-gradient(to top right, #ff6666 0%, #ff66ff 100%);">
                                                <div class="title">
                                                    <h5><b>MEDIUM FEATURES</b></h5>
                                                    <hr />
                                                </div>
                                                <h4 style="color:#e1e1e1;"><b>PRICE :
                                                        <?php echo $row['PackagePrice1']."/-";?></b></h4>
                                                <p style="color:#fff;"><b>FEATURES :
                                                    </b><?php echo $row['PackageLevel1'];?></p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card"
                                                style="background: linear-gradient(to top right, #66ccff 0%, #0033cc 100%);">
                                                <div class="title">
                                                    <h5><b>HIGH FEATURES</b></h5>
                                                    <hr />
                                                </div>
                                                <h4 style="color:#e1e1e1;"><b>PRICE :
                                                        <?php echo $row['PackagePrice2']."/-";?></b></h4>
                                                <p style="color:#fff;"><b>FEATURES :
                                                    </b><?php echo $row['PackageLevel2'];?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">From Date</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control" id="inputEmail3"
                                                placeholder="From Date" name="fromdate">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-2 control-label">To Date</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control" id="inputPassword3"
                                                placeholder="To Date" name="todate">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-2 control-label">Comment</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputPassword3"
                                                placeholder="Comment" name="comment">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-2 control-label">Feature Type</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="feature_type">
                                                <option>Low Features</option>
                                                <option>Medium Features</option>
                                                <option>High Features</option>
                                            </select>
                                        </div>
                                    </div>


                                    <br />
                                    <button type="submit" name="book1" class="btn btn-primary pull-right">BOOK</button>
                                </div>
                            </div>


                            <?php } ?>
                        </form>
                        <br />
                        <hr />

                        <div class="row">
                            <div class="col-md-6">
                                <center>
                                    <h3 class="text-center"><b>ONLINE TRANSACTION</b></h3>
                                    <p class="text-center">For secure & fast transaction to scan the below code</p>
                                    <img src="img/qrcode.jpg" style="width:250px;height:250px" class="img-responsive" />
                                </center>
                            </div>
                            <div>
                                <center>
                                    <h3 class="text-center"><b>DURATION</b></h3>
                                    <p class="text-center">To calculate which package suit our budget</p>
                                    <h5>Choose DurationTime</h5>

                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1"
                                                checked onClick="due(3)">
                                            3 Month
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"
                                                onClick="due(4)">
                                            4 Month
                                        </label>
                                    </div>
                                    <div class="radio disabled">
                                        <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3"
                                                onClick="due(6)">
                                            6 Month
                                        </label>
                                    </div>
                                    <p><b>Low Features : </b><span id="lprice">200</span> /- per month</p>
                                    <p><b>Medium Features: </b><span id="mprice">200</span> /- per month</p>
                                    <p><b>High Features : </b><span id="hprice">200</span> /- per month</p>

                                </center>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>


        <?php
      
      if(isset($_POST['book1']))
      {
          
          $fromdate=$_POST['fromdate'];
          $todate=$_POST['todate'];
          $comment=$_POST['comment'];
          $feature_type=$_POST['feature_type'];
          
            date_default_timezone_set('Asia/Kolkata');
            $date=date('Y-m-d h:i:s A');    

            $status=0;
            $sql="INSERT INTO tblbooking(PackageId,UserEmail,FromDate,ToDate,FeatureType,Comment,status) VALUES(:pid,:useremail,:fromdate,:todate,:feature_type,:comment,:status)";
            $query = $dbh->prepare($sql);
            $query->bindParam(':pid',$id,PDO::PARAM_STR);
            $query->bindParam(':useremail',$user_mail,PDO::PARAM_STR);
            $query->bindParam(':fromdate',$fromdate,PDO::PARAM_STR);
            $query->bindParam(':feature_type',$feature_type,PDO::PARAM_STR);
            $query->bindParam(':todate',$todate,PDO::PARAM_STR);
            $query->bindParam(':comment',$comment,PDO::PARAM_STR);
            $query->bindParam(':status',$status,PDO::PARAM_STR);
            $query->execute();
            $lastInsertId = $dbh->lastInsertId();
            if($lastInsertId)
            {
            $msg="Booked Successfully";
            }
            else 
            {
            $error="Something went wrong. Please try again";
            }
            
          mail($user_mail,"TOURISM","You are Booking request is successfully sended to admin");
          
          echo '<script>alert("Booked");</script>';
      }
         
      ?>


        <script>
        function rate(count) {
            if (count == 1) {
                document.getElementById("one_star").className = "glyphicon glyphicon-star";
            } else if (count == 2) {
                document.getElementById("one_star").className = "glyphicon glyphicon-star";
                document.getElementById("two_star").className = "glyphicon glyphicon-star";
            } else if (count == 3) {
                document.getElementById("one_star").className = "glyphicon glyphicon-star";
                document.getElementById("two_star").className = "glyphicon glyphicon-star";
                document.getElementById("three_star").className = "glyphicon glyphicon-star";
            } else if (count == 4) {
                document.getElementById("one_star").className = "glyphicon glyphicon-star";
                document.getElementById("two_star").className = "glyphicon glyphicon-star";
                document.getElementById("three_star").className = "glyphicon glyphicon-star";
                document.getElementById("four_star").className = "glyphicon glyphicon-star";
            } else if (count == 5) {
                document.getElementById("one_star").className = "glyphicon glyphicon-star";
                document.getElementById("two_star").className = "glyphicon glyphicon-star";
                document.getElementById("three_star").className = "glyphicon glyphicon-star";
                document.getElementById("four_star").className = "glyphicon glyphicon-star";
                document.getElementById("five_star").className = "glyphicon glyphicon-star";
            }
            document.getElementById("rate").value = count;
        }

        due(3);

        function due(month) {
            var lprice = "<?php echo $pprice; ?>";
            var mprice = "<?php echo $pprice1; ?>";
            var hprice = "<?php echo $pprice2; ?>";

            alert(mprice);

            document.getElementById("lprice").innerHTML = Math.ceil(lprice / month);
            document.getElementById("mprice").innerHTML = Math.ceil(mprice / month);
            document.getElementById("hprice").innerHTML = Math.ceil(hprice / month);


        }
        </script>



        <script src="bootstrap-3.2.0/jquery.min.js"></script>
        <script src="bootstrap-3.2.0/dist/js/bootstrap.min.js"></script>






</body>

</html>