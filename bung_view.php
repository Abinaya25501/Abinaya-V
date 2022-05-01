<?php
session_start();
include "db.php";
$user_mail = $_SESSION['user_mail'];
$mob = $_SESSION['mob'];
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

        <?php
$id=$_GET['id'];
$result=mysqli_query($con,"select * from bung_reg where sno='$id'");
while($row=$result->fetch_assoc())
{
    $name=$row['name'];
    $ad1=$row['address1'];
    $ad2=$row['address2'];
    $city=$row['city'];
    $dt=$row['district'];
    $regno=$row['regno'];
    $cno=$row['cno'];
    $time=$row['time'];
    $email=$row['email'];
    $img1=$row['img1'];
    $img2=$row['img2'];
    
      $ones=$row['1s'];
            $twos=$row['2s'];
            $threes=$row['3s'];
            $fours=$row['4s'];
            $fives=$row['5s'];
            $tot_star=$row['tot_star'];
    
    if($tot_star>=1){
     $tot_rating=((1*$ones)+(2*$twos)+(3*$threes)+(4*$fours)+(5*$fives))/$tot_star;
               $tot_rating=round($tot_rating,1);
    }
    
}
    
    
?>

        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-warning">
                    <div class="panel-heading" style="background-color:#FFA500;">
                        <h3 class="panel-title">BUNG DETAILS</h3>
                    </div>
                    <div class="panel-body" style="border:1px solid #FFA500;border-top:0;">

                        <form class="form-horizontal" role="form" method="post" action="" enctype="multipart/form-data">

                            <div class="form-group">

                                <div class="col-md-6">
                                    <img src="<?php echo $img1; ?>" style="height:250px;width:100%;" id="b1"><br><br>
                                </div>

                                <div class="col-md-6">
                                    <img src="<?php echo $img2; ?>" style="height:250px;width:100%;" id="b2"><br><br>
                                </div>

                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Bung Name</label>
                                <div class="col-sm-9">
                                    <h4><?php echo $name; ?></h4>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Address Line1</label>
                                <div class="col-sm-9">
                                    <h4><?php echo $ad1; ?></h4>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Address Line2</label>
                                <div class="col-sm-9">
                                    <h4><?php echo $ad2; ?></h4>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">City</label>
                                <div class="col-sm-9">
                                    <h4><?php echo $city; ?></h4>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">District</label>
                                <div class="col-sm-9">
                                    <h4><?php echo $dt; ?></h4>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Opening Time</label>
                                <div class="col-sm-9">
                                    <h4><?php echo $time; ?></h4>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Registration No</label>
                                <div class="col-sm-9">
                                    <h4><?php echo $regno; ?></h4>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Contact No</label>
                                <div class="col-sm-9">
                                    <h4><?php echo $cno; ?></h4>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-9">
                                    <h4><?php echo $email; ?></h4>
                                </div>
                            </div>

                            <?php
// $ac_type=$_SESSION['ac_type'];
//         if($ac_type=="driver_reg")
        {
        ?>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-default pull-right"
                                        style="background-color:#FFA500;" name="save">REQUEST</button>
                                </div>
                            </div>

                            <?php } ?>

                        </form>

                        <?php
      
if(isset($_POST['save']))
{
    $sno=0;
    $result=mysqli_query($con,"select * from request");
    $sno=mysqli_num_rows($result);
    $sno++;
    
     date_default_timezone_set('Asia/Kolkata');
      $date=date('Y-m-d h:i:s A');    
    
    mysqli_query($con,"insert into request values('$sno','$user_mail','$mob','$date','bung_reg')");
    
    mail($email,"REQUEST SERVICE","$user_mail Request Your Service. Please Contact further info $mob");
    
    echo '<script>alert("Request Sended");</script>';
}
   
?>

                    </div>
                </div>

            </div>


            <div class="col-md-6">
                <div class="row">

                    <?php
// $ac_type=$_SESSION['ac_type'];
//         if($ac_type=="driver_reg")
        {
        ?>

                    <div class="col-md-12" style="box-shadow: 3px 3px 20px -1px #ddd;padding:20px;">
                        <div style="font-size:16px" class="text-center"><b>RATE THIS SERVICE</b></div><br>

                        <form class="form-horizontal" role="form" method="post" action="" enctype="multipart/form-data">

                            <div class="form-group">
                                <label class="col-xs-2">CATEGORY</label>
                                <div class="col-xs-10">
                                    <select class="form-control" name="category">
                                        <option value="medical_reg">GOOD</option>
                                        <option value="hospital_reg">VERY GOOD</option>
                                        <option value="rest_reg">EXCELLENT</option>
                                        <option value="bung_reg">BAD</option>
                                        <option value="mshop_reg">VERY BAD</option>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-2">DESCRIPTION</label>
                                <div class="col-xs-10">
                                    <textarea cols="5" rows="5" class="form-control" name="desc"
                                        placeholder="Type here.."></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-3">GIVE RATING</label>
                                <div class="col-xs-9">
                                    <span id="one_star" class="glyphicon glyphicon-star-empty"
                                        style="font-size:34px;color:#FFA500;" onclick="rate(1);"></span>
                                    <span id="two_star" class="glyphicon glyphicon-star-empty"
                                        style="font-size:34px;color:#FFA500;" onclick="rate(2)"></span>
                                    <span id="three_star" class="glyphicon glyphicon-star-empty"
                                        style="font-size:34px;color:#FFA500;" onclick="rate(3)"></span>
                                    <span id="four_star" class="glyphicon glyphicon-star-empty"
                                        style="font-size:34px;color:#FFA500;" onclick="rate(4)"></span>
                                    <span id="five_star" class="glyphicon glyphicon-star-empty"
                                        style="font-size:34px;color:#FFA500;" onclick="rate(5)"></span>
                                </div>
                                <input type="text" name="rate" value="" id="rate" style="display:none;">

                            </div>

                            <br>
                            <div class="form-group">
                                <div class="col-sm-offset-4 col-sm-4">
                                    <button type="submit" class="btn btn-color btn-block" name="search"
                                        style="background-color:#FFA500;">Search</button>

                                </div>
                            </div>
                            <!--        <div class="text-center"> <a href="#" >Create New Account</a> </div>-->
                        </form>

                        <?php
        
    if(isset($_POST['search']))
    {
        $rate=$_POST['rate'];
        $category=$_POST['category'];
        $desc=$_POST['desc'];
//        echo '<script>alert("'.$rate.'");</script>';
        
        $result=mysqli_query($con,"select * from bung_reg where sno='$id'");
        while($row=$result->fetch_assoc())
        {
            $p=$rate."s";
            $d=$row[$p];
            
        }
        $d++;
        $tot_star++;
        mysqli_query($con,"update bung_reg set $p='$d',tot_star='$tot_star' where sno='$id'");
        
        $sno=0;
        $result=mysqli_query($con,"select * from reviews");
        $sno=mysqli_num_rows($result);
        $sno++;
        
        mysqli_query($con,"insert into reviews values('$sno','$category','$desc','$id','bung_reg')");
        
        echo '<meta http-equiv="refresh" content="1;URL=bung_view.php?id='.$id.'">';
    }
      
                 
                 
     ?>

                    </div>

                    <?php } ?>


                    <div class="col-md-12" style="box-shadow: 3px 3px 20px -1px #ddd;padding:20px;margin-top:40px;">
                        <div style="font-size:16px" class="text-center"><b>USER RATINGS</b></div><br>

                        <div class="row">
                            <div class="col-md-2 col-xs-4">

                                <?php if($tot_star>=1){ echo '
                               <div style="font-size:30px;">'.$tot_rating.' <span class="glyphicon glyphicon-star" style="font-size:20px;"></span></div>  <div style="color:#878787;"> Ratings </div>';} ?>

                            </div>
                            <div class="col-md-7 col-xs-8">
                                <div class="row">
                                    <div class="col-xs-2 padding-0 " style="font-size:15px;">5 <span
                                            class="glyphicon glyphicon-star" style="font-size:10px;"> </span></div>
                                    <div class="col-xs-8 padding-0" style="padding-top:10px;">
                                        <div class="progress" style="height:6px;">
                                            <div class="progress-bar progress-bar-success" role="progressbar"
                                                aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                                                style="width: <?php echo ($fives/$tot_star)*100; ?>%">
                                                <span class="sr-only">40% Complete (success)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-2 padding-0 "
                                        style="font-size:12px;padding-top:5px;color:#878787;"><?php echo $fives; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-2 padding-0 " style="font-size:15px;">4 <span
                                            class="glyphicon glyphicon-star" style="font-size:10px;"> </span></div>
                                    <div class="col-xs-8 padding-0" style="padding-top:10px;">
                                        <div class="progress" style="height:6px;">
                                            <div class="progress-bar progress-bar-success" role="progressbar"
                                                aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                                                style="width:<?php echo ($fours/$tot_star)*100; ?>%">
                                                <span class="sr-only">40% Complete (success)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-2 padding-0 "
                                        style="font-size:12px;padding-top:5px;color:#878787;"><?php echo $fours; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-2 padding-0" style="font-size:15px;">3 <span
                                            class="glyphicon glyphicon-star" style="font-size:10px;"> </span></div>
                                    <div class="col-xs-8 padding-0" style="padding-top:10px;">
                                        <div class="progress" style="height:6px;">
                                            <div class="progress-bar progress-bar-success" role="progressbar"
                                                aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                                                style="width: <?php echo ($threes/$tot_star)*100; ?>%">
                                                <span class="sr-only">40% Complete (success)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-2 padding-0 "
                                        style="font-size:12px;padding-top:5px;color:#878787;"><?php echo $threes; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-2 padding-0" style="font-size:15px;">2 <span
                                            class="glyphicon glyphicon-star" style="font-size:10px;"> </span></div>
                                    <div class="col-xs-8 padding-0" style="padding-top:10px;">
                                        <div class="progress" style="height:6px;">
                                            <div class="progress-bar progress-bar-warning" role="progressbar"
                                                aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                                                style="width: <?php echo ($twos/$tot_star)*100; ?>%">
                                                <span class="sr-only">40% Complete (success)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-2 padding-0"
                                        style="font-size:12px;padding-top:5px;color:#878787;"><?php echo $twos; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-2 padding-0" style="font-size:15px;">1 <span
                                            class="glyphicon glyphicon-star" style="font-size:10px;"> </span></div>
                                    <div class="col-xs-8 padding-0" style="padding-top:10px;">
                                        <div class="progress" style="height:6px;">
                                            <div class="progress-bar progress-bar-danger" role="progressbar"
                                                aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                                                style="width:<?php echo ($ones/$tot_star)*100; ?>%">
                                                <span class="sr-only">40% Complete (success)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-2 padding-0 "
                                        style="font-size:12px;padding-top:5px;color:#878787;"><?php echo $ones; ?></div>
                                </div>
                            </div>
                        </div>

                    </div>



                </div>
            </div>




        </div>
    </div>


    <script src="bootstrap-3.2.0/jquery.min.js"></script>
    <script src="bootstrap-3.2.0/dist/js/bootstrap.min.js"></script>



    <script>
    function readURL(input, file, img_id) {
        const fi = document.getElementById(file);
        // Check if any file is selected. 
        if (fi.files.length > 0) {
            for (const i = 0; i <= fi.files.length - 1; i++) {

                const fsize = fi.files.item(i).size;
                const file = Math.round((fsize / 1024));



                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        var img = new Image();
                        img.src = e.target.result;

                        img.onload = function() {
                            var w = this.width;
                            var h = this.height;

                            $(img_id)
                                .attr('src', e.target.result);

                        }

                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }
        }
    }
    </script>


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
    </script>


</body>

</html>