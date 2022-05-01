<?php
session_start();
include "db.php";
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
            <div class="col-md-offset-3  col-md-6">
                <div class="panel panel-warning">
                    <div class="panel-heading" style="background-color:#FFA500;">
                        <h3 class="panel-title">MECHANICSHOP REGISTRATION</h3>
                    </div>
                    <div class="panel-body" style="border:1px solid #FFA500;border-top:0;">

                        <form class="form-horizontal" role="form" method="post" action="" enctype="multipart/form-data">

                            <div class="form-group">

                                <div class="col-md-6">
                                    <img src="img/dm.png" style="height:250px;width:100%;" id="b1"><br><br>
                                    <div class="btn btn-warning" style="position: relative;overflow: hidden;">
                                        <span>Choose Profile</span>
                                        <input type="file" class="" name="image1" id="fileb1"
                                            onchange="readURL(this,'fileb1','#b1');" required
                                            style="position:relative;overflow:hidden;position: absolute;top: 0;right: 0;margin: 0; padding: 0;font-size: 20px;cursor: pointer;opacity: 0;filter: alpha(opacity=0);">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <img src="img/dm.png" style="height:250px;width:100%;" id="b2"><br><br>
                                    <div class="btn btn-warning" style="position: relative;overflow: hidden;">
                                        <span>Choose Image</span>
                                        <input type="file" class="" name="image2" id="fileb2"
                                            onchange="readURL(this,'fileb2','#b2');" required
                                            style="position:relative;overflow:hidden;position: absolute;top: 0;right: 0;margin: 0; padding: 0;font-size: 20px;cursor: pointer;opacity: 0;filter: alpha(opacity=0);">
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">MechanicShop</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control text" id="inputEmail3"
                                        placeholder="Shop Name" name="name">
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Address Line1</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control text" id="inputEmail3"
                                        placeholder="Address Line1" name="ad1">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Address Line2</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control text" id="inputEmail3"
                                        placeholder="Address Line2" name="ad2">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">City</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control text" id="inputEmail3" placeholder="City"
                                        name="city">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">District</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control text" id="inputEmail3" placeholder="District"
                                        name="dt">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Contact No</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control text" id="inputEmail3"
                                        placeholder="Contact No" name="cno">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Opening Time</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control text" id="inputEmail3"
                                        placeholder="Opening Time" name="ot">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Registration No</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control text" id="inputEmail3" placeholder="Reg No"
                                        name="regno">
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control text" id="inputEmail3" placeholder="Email"
                                        name="email">
                                </div>
                            </div>
                            <div class="form-group" style="display:none">
                                <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control text" id="inputPassword3"
                                        placeholder="Password" name="pwd" value="123">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-default pull-right"
                                        style="background-color:#FFA500;" name="m_save">Submit</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>


            </div>
        </div>
    </div>

    <?php
if(isset($_POST['m_save']))
{

$name=$_POST['name'];
$ad1=$_POST['ad1'];
$ad2=$_POST['ad2'];
$city=$_POST['city'];
$dt=$_POST['dt'];
$regno=$_POST['regno'];
$cno=$_POST['cno'];
$ot=$_POST['ot'];
$email=$_POST['email'];
$pwd=$_POST['pwd'];
    
   
    
         $tp="upload/";
          $img=$tp.$_FILES['image1']['name'];
          $b=pathinfo($img,PATHINFO_EXTENSION);
          $tp1=$tp.basename($_FILES['image1']['name']);
          move_uploaded_file($_FILES['image1']['tmp_name'],$tp1);
              
          $aimg=$tp.$_FILES['image2']['name'];
          $ab=pathinfo($aimg,PATHINFO_EXTENSION);
          $atp1=$tp.basename($_FILES['image2']['name']);
          move_uploaded_file($_FILES['image2']['tmp_name'],$atp1);
    
    

    $sno=0;
    $result=mysqli_query($con,"select * from mshop_reg");
    $sno=mysqli_num_rows($result);
    $sno++;
    
    mysqli_query($con,"insert into mshop_reg values('$sno','$name','$ad1','$ad2','$city','$dt','$regno','$cno','$ot','$email','$pwd','$img','$aimg','0','0','0','0','0','0')");
    
    echo '<script>alert("Successfully Inserted");</script>';
}


?>

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


</body>

</html>