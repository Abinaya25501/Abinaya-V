<?php
session_start();
include "db.php";
error_reporting(0);
include('admin/includes/config.php');
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
                        <h3 class="panel-title">SIGN UP</h3>
                    </div>
                    <div class="panel-body" style="border:1px solid #FFA500;border-top:0;">
                        <form class="form-horizontal" role="form" method="post" action="" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control text" id="inputEmail3" placeholder="Name"
                                        name="name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Phone No</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control text" id="inputEmail3" placeholder="Phone No"
                                        name="pno">
                                </div>
                            </div>
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


                            <br>
                            <div class="form-group">
                                <div class="col-sm-offset-4 col-sm-4">
                                    <button type="submit" class="btn btn-color btn-block" name="sign_in">SIGN
                                        UP</button>

                                </div>
                            </div>
                            <div class="text-center"> <a href="login.php">Back</a> </div>
                        </form>
                    </div>
                </div>
            </div>

            <?php
        $temp=0;
        if(isset($_POST['sign_in']))
        {
          $name=$_POST['name'];
          $pno=$_POST['pno'];
            $user_id=$_POST['user_id'];
            $pwd=$_POST['pwd'];
            $ac_type=$_POST['ac_type'];

                // AES ENCRYPTION:
                $cipher = "AES-128-CTR";
                $iv_length = openssl_cipher_iv_length($cipher); 
                $options = 0;  
                $iv = '8565825542115032'; 
                $enc_key = "travel"; 
                $pno = openssl_encrypt($pno, $cipher, $enc_key, $options, $iv);  
                $pwd = md5($pwd);
            
            $sql="INSERT INTO  tblusers(FullName,MobileNumber,EmailId,Password) VALUES(:fname,:mnumber,:email,:password)";
$query = $dbh->prepare($sql);
$query->bindParam(':fname',$name,PDO::PARAM_STR);
$query->bindParam(':mnumber',$pno,PDO::PARAM_STR);
$query->bindParam(':email',$user_id,PDO::PARAM_STR);
$query->bindParam(':password',$pwd,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$_SESSION['msg']="You are Scuccessfully registered. Now you can login ";
echo '<script>alert("You are Scuccessfully registered. Now you can login");</script>';
}
else 
{
$_SESSION['msg']="Something went wrong. Please try again.";
echo '<script>alert("Something went wrong. Please try again.");</script>';
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