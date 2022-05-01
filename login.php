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
</head>

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


<body>


    <?php include "nav.php"; ?>

    <div class="container">
        <br><br><br>
        <div class="row">
            <div class="col-md-offset-3  col-md-6">
                <div class="panel panel-warning">
                    <div class="panel-heading" style="background-color:#FFA500;">
                        <h3 class="panel-title">SIGN IN</h3>
                    </div>
                    <div class="panel-body" style="border:1px solid #FFA500;border-top:0;">
                        <form class="form-horizontal" role="form" method="post" action="" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control text" id="inputEmail3" placeholder="Email"
                                        name="user_id">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control text" id="inputPassword3"
                                        placeholder="Password" name="pwd">
                                </div>
                            </div>
                            <!-- <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Account Type</label>
                                <div class="col-sm-10">
                                    <select class="form-control text" name="ac_type">

                                        <option value="driver_reg">Diver</option>
                                        <option value="medical_reg">Medical</option>
                                        <option value="hospital_reg">Hospital</option>
                                        <option value="rest_reg">Restaruant</option>
                                        <option value="bung_reg">Petrol Bung</option>
                                        <option value="mshop_reg">Mechanic Shop</option>
                                        <option value="eme_reg">Emergency</option>

                                    </select>
                                </div>
                            </div> -->

                            <br>
                            <div class="form-group">
                                <div class="col-sm-offset-4 col-sm-4">
                                    <button type="submit" class="btn btn-color btn-block" name="sign_in">SIGN
                                        IN</button>

                                </div>
                            </div>
                            <div class="text-center"> <a href="signup.php">Create New Account</a> </div>
                        </form>
                    </div>
                </div>
            </div>

            <?php
        $temp=0;
        if(isset($_POST['sign_in']))
        {
            $user_id=$_POST['user_id'];
            $pwd=$_POST['pwd'];
            $pwd = md5($pwd);

          

            // $ac_type=$_POST['ac_type'];
            $result=mysqli_query($con,"select * from tblusers");
            while($row=$result->fetch_Assoc())
            {
                
                if($row['EmailId']==$user_id && $row['Password']==$pwd)
                {
                    $temp=1;
                    $mob = $row['MobileNumber'];
                 
                }
            }
            if($temp==1)
            {
                $_SESSION['login_id']=1;
                // $_SESSION['ac_type']=$ac_type;
                $_SESSION['user_mail']=$user_id;

    // DECRYPTION:
    $cipher = "AES-128-CTR";  
    $options = 0;  
    $decryption_iv = '8565825542115032'; 
    $dec_key = "travel"; 
    $mob=openssl_decrypt ($mob, $cipher, $dec_key, $options, $decryption_iv);
                
    $_SESSION['mob'] = $mob;
                
    echo '<meta http-equiv="refresh" content="1;URL=index.php">';
            }
            else
            {
                echo '<script>alert("Incorrect username/password");</script>';
            }
            
        }
    ?>
            <script src="bootstrap-3.2.0/jquery.min.js"></script>
            <script src="bootstrap-3.2.0/dist/js/bootstrap.min.js"></script>
        </div>

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