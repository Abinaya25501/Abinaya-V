<?php
session_start();
if(isset($_SESSION['login_id']))
{
//   $_SESSION['login_id']=1;   
}
else
{
    $_SESSION['login_id']=0;
}
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


    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <img src="img/carousel_1.jpg" alt="...">
                <div class="carousel-caption">
                    ...
                </div>
            </div>
            <div class="item">
                <img src="img/carousel_2.jpg" alt="...">
                <div class="carousel-caption">
                    ...
                </div>
            </div>
            <div class="item">
                <img src="img/carousel_3.jpg" alt="...">
                <div class="carousel-caption">
                    ...
                </div>
            </div>
            ...
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>




    <div class="row" style="margin:20px;">
        <div class="col-md-6 col-xs-12">
            <img src="img/bg.jpg" style="width:550px;height:400px;">
        </div><br>
        <div class="col-md-6 col-xs-12">
            <p class="text-justify">Nearly everyone goes on a vacation and a Tourism management system would play a
                vital role in planning the perfect trip. The tourism management system allows the user of the system
                access all the details such as weather, location, events, etc. The main purpose is to help tourism
                companies to manage customer and hotels etc. The system can also be used for both professional and
                business trips. The proposed system maintains centralized repository to make necessary travel
                arrangements and to retrieve information easily.<br><br></p>
            <p class="text-justify">The tourism management systems must include solutions for trackingvisitors,
                analyzing trends, target marketing, and CRM. Indusa Global hasintroduced a software sysem for this
                purpose, called VisiTrak1The VisiTraksolution provides customers with consulting services such as Forms
                and Sur-vey Design, Process Design and Re-engineering, and Workﬂow Optimization.The same software
                development corporation has produced a semi intelligentsystem, called the VisiTrends. The VisiTrends
                solution provides decisionmakers with the ability to slice and dice data, analyze trends, and
                proﬁlevisitors demographically and psycho-graphically. VisiTrends is using ma-chine learning and data
                mining techniques to guide tourists</p>


        </div>
    </div>

    <div class="row" style="margin:20px;margin-top:50px;">
        <div class="col-xs-12" style="padding:20px;background-color:#000;color:#fff;border-radius:5px;opacity:0.7;">
            <p< /p>
                <p>The tourism management systems must include solutions for trackingvisitors,
                    analyzing trends, target marketing, and CRM. Indusa Global hasintroduced a software sysem for this
                    purpose, called VisiTrak1The VisiTraksolution provides customers with consulting services such as
                    Forms
                    and Sur-vey Design, Process Design and Re-engineering, and Workﬂow Optimization.The same software
                    development corporation has produced a semi intelligentsystem, called the VisiTrends. The VisiTrends
                    solution provides decisionmakers with the ability to slice and dice data, analyze trends, and
                    proﬁlevisitors demographically and psycho-graphically. VisiTrends is using ma-chine learning and
                    data
                    mining techniques to guide tourists</p>
                <p>The tourism management systems must include solutions for trackingvisitors,
                    analyzing trends, target marketing, and CRM. Indusa Global hasintroduced a software sysem for this
                    purpose, called VisiTrak1The VisiTraksolution provides customers with consulting services such as
                    Forms
                    and Sur-vey Design, Process Design and Re-engineering, and Workﬂow Optimization.The same software
                    development corporation has produced a semi intelligentsystem, called the VisiTrends. The VisiTrends
                    solution provides decisionmakers with the ability to slice and dice data, analyze trends, and
                    proﬁlevisitors demographically and psycho-graphically. VisiTrends is using ma-chine learning and
                    data
                    mining techniques to guide tourists</p>
        </div>
    </div>


    <section>
        <div class="row" style="margin:20px;margin-top:50px;">
            <div class="col-md-4">

                <?php
            
        $result=mysqli_query($con,"select * from hospital_reg order by tot_star");
        while($row=$result->fetch_assoc())
        {
            $ones=$row['1s'];
            $twos=$row['2s'];
            $threes=$row['3s'];
            $fours=$row['4s'];
            $fives=$row['5s'];
            $tot_star=$row['tot_star'];
             $img1=$row['img1'];
            $img2=$row['img2'];
            $name=$row['name'];
    
    if($tot_star>=1){
     $tot_rating=((1*$ones)+(2*$twos)+(3*$threes)+(4*$fours)+(5*$fives))/$tot_star;
               $tot_rating=round($tot_rating);
    }
        }
            
        ?>

                <div class="card" style="border-radius:5px;">
                    <div
                        style="padding:30px;background-color:#e1e1e1;border-radius:5px;background-color:#465349 ;box-shadow: 3px 3px 20px -1px #ddd;">

                        <img src="<?php echo $img1; ?>" class="img-rounded"
                            style="width:300px;height:280px;margin-left:-55px;padding-right:10px;padding-top:10px;">
                        <div class="row" style="padding:10px;">
                            <div class="col-xs-1">
                                <img src="<?php echo $img2; ?>" class="img-circle"
                                    style="width:60px;height:60px;margin-left:-75px;">
                            </div>
                            <div class="col-xs-10">
                                <div style="margin-top:15px;color:white;" class="text-uppercase"><?php echo $name; ?>
                                </div>
                                <div style="padding-top:10px;">

                                    <?php
                     if($tot_star>=1){
                    for($i=0;$i<$tot_rating;$i++)
                    {
                        echo ' <span class="glyphicon glyphicon-star" style="font-size:30px;color:#FFDF00;"></span>';
                    }
                     }
                    ?>


                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <div class="col-md-4">

                <?php
            
        $result=mysqli_query($con,"select * from bung_reg order by tot_star");
        while($row=$result->fetch_assoc())
        {
            $ones=$row['1s'];
            $twos=$row['2s'];
            $threes=$row['3s'];
            $fours=$row['4s'];
            $fives=$row['5s'];
            $tot_star=$row['tot_star'];
             $img1=$row['img1'];
            $img2=$row['img2'];
            $name=$row['name'];
    
    if($tot_star>=1){
     $tot_rating=((1*$ones)+(2*$twos)+(3*$threes)+(4*$fours)+(5*$fives))/$tot_star;
               $tot_rating=round($tot_rating);
    }
        }
            
        ?>

                <div class="card" style="border-radius:5px;">
                    <div
                        style="padding:30px;background-color:#e1e1e1;border-radius:5px;background-color:#465349 ;box-shadow: 3px 3px 20px -1px #ddd;">

                        <img src="<?php echo $img1; ?>" class="img-rounded"
                            style="width:300px;height:280px;margin-left:-55px;padding-right:10px;padding-top:10px;">
                        <div class="row" style="padding:10px;">
                            <div class="col-xs-1">
                                <img src="<?php echo $img2; ?>" class="img-circle"
                                    style="width:60px;height:60px;margin-left:-75px;">
                            </div>
                            <div class="col-xs-10">
                                <div style="margin-top:15px;color:white;"><?php echo $name; ?></div>
                                <div style="padding-top:10px;">
                                    <?php
                     if($tot_star>=1){
                    for($i=0;$i<$tot_rating;$i++)
                    {
                        echo ' <span class="glyphicon glyphicon-star" style="font-size:30px;color:#FFDF00;"></span>';
                    }
                     }
                    ?>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <div class="col-md-4">


                <?php
            
        $result=mysqli_query($con,"select * from mshop_reg order by tot_star");
        while($row=$result->fetch_assoc())
        {
            $ones=$row['1s'];
            $twos=$row['2s'];
            $threes=$row['3s'];
            $fours=$row['4s'];
            $fives=$row['5s'];
            $tot_star=$row['tot_star'];
             $img1=$row['img1'];
            $img2=$row['img2'];
            $name=$row['name'];
    
    if($tot_star>=1){
     $tot_rating=((1*$ones)+(2*$twos)+(3*$threes)+(4*$fours)+(5*$fives))/$tot_star;
               $tot_rating=round($tot_rating);
    }
        }
            
        ?>

                <div class="card" style="border-radius:5px;">
                    <div
                        style="padding:30px;background-color:#e1e1e1;border-radius:5px;background-color:#465349 ;box-shadow: 3px 3px 20px -1px #ddd;">

                        <img src="<?php echo $img1; ?>" class="img-rounded"
                            style="width:300px;height:280px;margin-left:-55px;padding-right:10px;padding-top:10px;">
                        <div class="row" style="padding:10px;">
                            <div class="col-xs-1">
                                <img src="<?php echo $img2; ?>" class="img-circle"
                                    style="width:60px;height:60px;margin-left:-75px;">
                            </div>
                            <div class="col-xs-10">
                                <div style="margin-top:15px;color:white;"><?php echo $name; ?></div>
                                <div style="padding-top:10px;">
                                    <?php
                     if($tot_star>=1){
                    for($i=0;$i<$tot_rating;$i++)
                    {
                        echo ' <span class="glyphicon glyphicon-star" style="font-size:30px;color:#FFDF00;"></span>';
                    }
                     }
                    ?>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>


    <section></section>



    <div class="row" style="margin-top:50px;">
        <div class="col-xs-12" style="padding:40px;background-color:#000;color:#fff;border-radius:5px;opacity:0.7;">

            <div class="row">

                <div class="col-xs-4">
                    <h3>ABOUT US</h3>
                    <p class="text-justify">The tourism management systems must include solutions for trackingvisitors,
                        analyzing trends, target marketing, and CRM. Indusa Global hasintroduced a software sysem for
                        this
                        purpose, called VisiTrak1The VisiTraksolution provides customers with consulting services such
                        as Forms
                        and Sur-vey Design, Process Design and Re-engineering, and Workﬂow Optimization.The same
                        software
                        development corporation has produced a semi intelligentsystem, called the VisiTrends. The
                        VisiTrends
                        solution provides decisionmakers with the ability to slice and dice data, analyze trends, and
                        proﬁlevisitors demographically and psycho-graphically. VisiTrends is using ma-chine learning and
                        data
                        mining techniques to guide tourists</p>
                </div>
                <div class="col-xs-4" style="padding-left:120px;">
                    <h3>HELP</h3>
                    <ul style="text-decoration:none;">
                        <li>Help Center</li>
                        <li>Contact Us</li>
                        <li>Instructions</li>
                        <li>Feedback</li>
                    </ul>

                    <h3>SOCIAL MEDIA</h3>
                    <ul style="text-decoration:none;">
                        <li>Instagram</li>
                        <li>Facebook</li>
                        <li>Twitter</li>
                        <li>Youtube</li>
                        <li>Gmail</li>
                    </ul>


                </div>
                <div class="col-xs-4">

                    <h3>SUBSCRIBE</h3>
                    <br>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control text" id="inputEmail3" placeholder="Address Line1"
                                name="ad1">
                        </div>
                    </div>
                    <br> <br>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Description</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control text" id="inputEmail3" placeholder="Desciption"
                                name="ad1">
                        </div>
                    </div>
                    <br><br>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn pull-right" style="background-color:#FFA500;"
                                name="d_save">Subscribe</button>
                        </div>
                    </div>

                </div>


            </div>

        </div>
    </div>







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