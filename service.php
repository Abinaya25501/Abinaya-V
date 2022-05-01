<?php
session_start();
include "db.php";
if(isset($_SESSION['login_id']))
{
   $_SESSION['login_id']=1;   
}
else
{
    $_SESSION['login_id']=0;
}
$type=$_GET['type'];
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

    /*
a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}
*/
    </style>
</head>

<body>

    <?php include "nav.php"; ?>

    <!-- <h3 class="text-center"><b>MEDICAL SHOPS  <span class="text-uppercase"></span></b></h3>-->

    <form method="post" action="">
        <div class="row">
            <?php 
    $path="";
    if($type=="bung_reg")
    {
        $path="bung_view.php";
    }
    else if($type=="mshop_reg")
    {
        $path="mshop_view.php";
    }
    else if($type=="eme_reg")
    {
        $path="emergency_view.php";
    }
    else if($type=="hospital_reg")
    {
        $path="hospital_view.php";
    }
    else if($type=="medical_reg")
    {
        $path="medical_view.php";
    }
    else if($type=="rest_reg")
    {
        $path="rest_view.php";
    }
?>

            <?php
        $result=mysqli_query($con,"select * from $type");
        while($row=$result->fetch_assoc())
        {
            $sno=$row['sno'];
            $k=$path."?id=$sno";
        ?>


            <div class="col-md-3">
                <div class="card">
                    <a href="<?php echo $k; ?>">
                        <img src="<?php echo $row['img1']; ?>" style="width:250px;height:260px;">
                        <h4><?php echo $row['name']; ?></h4>
                        <p class="title"><?php echo $row['district']; ?> </p>
                        <input type="text" name="t_id" value="nb" style="display:none;">
                        <p><button class="btn" style="background-color:#FFA500;color:#fff;padding:10px;font-size:16px;"
                                name="view"><b>VIEW</b></button></p>
                    </a>
                </div>
            </div>

            <?php
          }
  
          ?>


        </div>
    </form>



    <script src="bootstrap-3.2.0/jquery.min.js"></script>
    <script src="bootstrap-3.2.0/dist/js/bootstrap.min.js"></script>




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