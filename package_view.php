<?php
session_start();
error_reporting(0);
include('includes/config.php');
include "db.php";
if(isset($_SESSION['login_id']))
{
   $_SESSION['login_id']=1;   
}
else
{
    $_SESSION['login_id']=0;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="ScreenOrientation" content="autoRotate:disabled">
    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">
    <title>TOURISM</title>
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


    <div class="row">


        <?php 
            $result =mysqli_query($con,"SELECT * from tbltourpackages");
            while($row = $result -> fetch_assoc()){

            
            
    ?>
        <form method="post" action="">
            <div class="col-md-3">
                <div class="card">
                    <a href="<?php echo $k; ?>">
                        <img src="admin/pacakgeimages/<?php echo $row['PackageImage'];?>"
                            style="width:250px;height:260px;margin-top:10px;">
                        <h4>Package Name: <?php echo $row['PackageName'];?></h4>
                        <p class="title">Package Price : <?php echo $row['PackagePrice'];?> </p>
                        <input type="text" name="t_id" value="<?php echo $row['PackageId'];?>" style="display:none;">
                        <p><button class="btn" style="background-color:#FFA500;color:#fff;padding:10px;font-size:16px;"
                                name="view"><b>VIEW</b></button></p>
                    </a>
                </div>
            </div>
        </form>

        <?php } ?>



    </div>


    <?php
    if(isset($_POST['view'])){
        $id = $_POST['t_id'];
        echo '<meta http-equiv="refresh" content="1;URL=package_view_details.php?id='.$id.'">';
    }
    ?>



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