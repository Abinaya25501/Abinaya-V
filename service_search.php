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
            <div class="col-md-offset-3  col-md-6" style="box-shadow: 3px 3px 20px -1px #ddd;padding:20px;">
                <div style="font-size:16px" class="text-center"><b>SEARCH SERVICES</b></div><br>

                <form class="form-horizontal" role="form" method="post" action="" enctype="multipart/form-data">

                    <div class="form-group">
                        <div class="col-xs-12">
                            <select class="form-control text" name="ac_type">
                                <option value="--Select Service--">--Select Service--</option>
                                <option value="medical_reg">Medical</option>
                                <option value="hospital_reg">Hospital</option>
                                <option value="rest_reg">Restaruant</option>
                                <option value="bung_reg">Petrol Bung</option>
                                <option value="mshop_reg">Mechanic Shop</option>
                                <option value="eme_reg">Emergency</option>

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-6">
                            <input type="text" class="form-control" name="district" placeholder="Enter District">
                        </div>
                        <div class="col-xs-6">
                            <input type="text" class="form-control" name="city" placeholder="Enter City">
                        </div>
                    </div>

                    <br>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-4">
                            <button type="submit" class="btn btn-color btn-block" name="search">Search</button>

                        </div>
                    </div>
                    <!--        <div class="text-center"> <a href="#" >Create New Account</a> </div>-->
                </form>
            </div>
        </div>
        <br><br>
        <div class="table-responsive">
            <table class="table table-bordered">

                <tr>
                    <th>SNO</th>
                    <th>IMAGE</th>
                    <th>NAME</th>
                    <th>OPENING TIME</th>
                    <th>CONTACT</th>
                    <th>DETAIL</th>

                </tr>





                <?php
        $sno=0;
        if(isset($_POST['search']))
        {
            $district=$_POST['district'];
            $city=$_POST['city'];
            $ac_type=$_POST['ac_type'];
            $result=mysqli_query($con,"select * from $ac_type");
            while($row=$result->fetch_Assoc())
            {
                if($ac_type=="medical_reg") $path="medical_view.php";
                else if($ac_type=="hospital_reg") $path="hospital_view.php";
                else if($ac_type=="eme_reg") $path="eme_view.php";
                else if($ac_type=="mshop_reg") $path="mshop_view.php";
                else if($ac_type=="bung_reg") $path="bung_view.php";
                else if($ac_type=="rest_reg") $path="rest_view.php";
                
                if($row['district']==$district && $row['city']==$city)
                {
                    $id=$row['sno'];
                    $d=$path."?id=$id";
                    $sno++;
                    echo '<tr>
                    <td>'.$sno.'</td>
                    <td><img src="'.$row['img1'].'" style="width:60px;height:40px;">&nbsp;&nbsp;<img src="'.$row['img2'].'" style="width:60px;height:40px;"></td>
                    <td>'.$row['name'].'</td>
                    <td>'.$row['time'].'</td>
                    <td>'.$row['cno'].'</td>
                    <td><a href="'.$d.'">View more</a></th>
                    </tr>';
                }
            }
            
        }
    ?>

            </table>
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