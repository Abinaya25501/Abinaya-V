<?php
// session_start();
$log=$_SESSION['login_id'];
//echo '<script>alert("'.$log.'");</script>';
?>
<div style="width:100%;padding:10px;background-color:#FFA500;">
    <div style="font-size:16px;"><b>TOURISM MANAGEMENT SYSTEM</b></div>
</div>
<nav class="navbar navbar-default" role="navigation"
    style="background-color:#465349 ;box-shadow: 3px 3px 20px -1px #ddd;width:100%;margin:0;z-index:1;border:none;border-radius:0;">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!--      <a class="navbar-brand" href="index.php" style="color:#ffee58;">TRASH DISPENSARY </a>-->
        </div>
        <?php
      if($_SESSION['login_id']==1)
      {
      ?>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav" style=" color:#fff;">
                <li class="navb"><a href="index.php" style="color:#fff;font-size:14px;"><span
                            class="glyphicon glyphicon-home"></span>&nbsp;&nbsp;Home</a></li>

                <li class="navb"><a href="package_view.php" style="color:#fff;font-size:14px;"><span
                            class="glyphicon glyphicon-time"></span>&nbsp;&nbsp;Tour Package</a></li>

                <li class="navb"><a href="booking_details.php" style="color:#fff;font-size:14px;"><span
                            class="glyphicon glyphicon-time"></span>&nbsp;&nbsp;Booking Details</a></li>

                <li class="dropdown navb">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown" style="color:#fff;font-size:14px;"><span
                            class="glyphicon glyphicon-th-list"></span>&nbsp;&nbsp;Service Provider <span
                            class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="service.php?type=medical_reg">Medical</a></li>
                        <li><a href="service.php?type=hospital_reg">Hospital</a></li>
                        <li><a href="service.php?type=rest_reg">Restaruant</a></li>
                        <li><a href="service.php?type=bung_reg">Petrol Bung</a></li>
                        <li><a href="service.php?type=mshop_reg">Mechanic Shop</a></li>
                        <li><a href="service.php?type=eme_reg">Emergency</a></li>
                    </ul>
                </li>

                <li class="navb"><a href="post_issue.php" style="color:#fff;font-size:14px;"><span
                            class="glyphicon glyphicon-time"></span>&nbsp;&nbsp;Post Issues</a></li>

                <?php
        //   $ac_type=$_SESSION['ac_type'];
        //   if($ac_type=="driver_reg")
        //   {
        //       echo ' <li class="navb"><a href="service_search.php"  style="color:#fff;font-size:14px;" ><span class="glyphicon glyphicon-search"></span>&nbsp;&nbsp;Search Service</a></li>';
        //   }
        //   else 
        //   {
        //       echo ' <li class="navb"><a href="request_service.php"  style="color:#fff;font-size:14px;" ><span class="glyphicon glyphicon-search"></span>&nbsp;&nbsp;Requested Service</a></li>';
        //   }
          ?>




                <li class="dropdown navb">
                    <a href="login.php" class="dropdown-toggle" data-toggle="dropdown"
                        style="color:#fff;font-size:14px;"><span
                            class="glyphicon glyphicon-edit"></span>&nbsp;&nbsp;Service Register <span
                            class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="medical_reg.php">Medical</a></li>
                        <li><a href="hospital_reg.php">Hospital</a></li>
                        <li><a href="rest_reg.php">Restaruant</a></li>
                        <li><a href="bung_reg.php">Petrol Bung</a></li>
                        <li><a href="mshop_reg.php">Mechanic Shop</a></li>
                        <li><a href="emergency_reg.php">Emergency</a></li>
                    </ul>
                </li>
                <!--        <li class="navb"><a href="login.php"  style="color:#fff;font-size:14px;"><span class="glyphicon glyphicon-star"></span>&nbsp;&nbsp;Give Rating</a></li>    -->
            </ul>

            <form method="post" action="">
                <ul class="nav navbar-nav navbar-right">
                    <li class="navb"><button type="submit" name="logout" class="btn btn-link"
                            style="color:#fff;font-size:14px;padding:15px;border:none;outline:none;text-decoration:none;"><span
                                class="glyphicon glyphicon-off"></span>&nbsp;&nbsp;Logout</button></li>
                </ul>
            </form>

            <?php
          if(isset($_POST['logout']))
          {
              $_SESSION['login_id']=0;
              echo '<meta http-equiv="refresh" content="1;URL=index.php">';
          }
          ?>

        </div>
        <!-- /.navbar-collapse -->

        <?php
      }
      else if($_SESSION['login_id']==0)
      {
          ?>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav" style=" color:#fff;">
                <li class="navb"><a href="index.php" style="color:#fff;font-size:14px;"><span
                            class="glyphicon glyphicon-home"></span>&nbsp;&nbsp;Home</a></li>

                <li class="navb"><a href="login.php" style="color:#fff;font-size:14px;"><span
                            class="glyphicon glyphicon-time"></span>&nbsp;&nbsp;Tour Package</a></li>

                <li class="navb"><a href="login.php" style="color:#fff;font-size:14px;"><span
                            class="glyphicon glyphicon-time"></span>&nbsp;&nbsp;Booking Details</a></li>

                <li class="dropdown navb">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown" style="color:#fff;font-size:14px;"><span
                            class="glyphicon glyphicon-th-list"></span>&nbsp;&nbsp;Service Provider <span
                            class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="login.php">Medical</a></li>
                        <li><a href="login.php">Hospital</a></li>
                        <li><a href="login.php">Restaruant</a></li>
                        <li><a href="login.php">Petrol Bung</a></li>
                        <li><a href="login.php">Emergency</a></li>
                    </ul>
                </li>

                <li class="dropdown navb">
                    <a href="login.php" class="dropdown-toggle" data-toggle="dropdown"
                        style="color:#fff;font-size:14px;"><span
                            class="glyphicon glyphicon-edit"></span>&nbsp;&nbsp;Service Register <span
                            class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="medical_reg.php">Medical</a></li>
                        <li><a href="hospital_reg.php">Hospital</a></li>
                        <li><a href="rest_reg.php">Restaruant</a></li>
                        <li><a href="bung_reg.php">Petrol Bung</a></li>
                        <li><a href="emergency_reg.php">Emergency</a></li>

                    </ul>
                </li>
                <!--        <li class="navb"><a href="login.php"  style="color:#fff;font-size:14px;"><span class="glyphicon glyphicon-star"></span>&nbsp;&nbsp;Give Rating</a></li>    -->

            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li class="navb"><a href="login.php" style="color:#fff;font-size:14px;"><span
                            class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;Login</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li class="navb"><a href="adminlogin.php" style="color:#fff;font-size:14px;"><span
                            class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;Admin</a></li>
            </ul>


        </div>
        <!-- /.navbar-collapse -->
        <?php
      }
      ?>

    </div><!-- /.container-fluid -->


</nav>


<br><br>