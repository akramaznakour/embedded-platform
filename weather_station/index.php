<?php
session_start();
require '../dataBase/Database.php';
$database = new Database();
if ($database->getIsEmpty()) {
    header('location:nodata.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'includes/head.php' ?>
    <style>
        .donut-inner {
           
         }
        .donut-inner *{
         font-size: 1.25em;
        }

        .donut-inner_sm {
             margin-top: -40%;
             margin-bottom: 100%;
         }
        .donut-inner-sm *{
         font-size: 50%;
        }
    </style>
</head>

<body style="background-color: #F7F7F7">
<div class="container body">

    <!-- top navigation -->
    <?php require 'includes/navigation.php' ?>
    <!-- /top navigation -->

    <!-- page content -->
    <div class="right_col" style="margin-top: 10px;" role="main">


        <div class=" col-xm-12  col-xs-12  col-sm-12  col-md-12   col-lg-12  ">

            <div class="x_panel">
                <div class="x_title">
                    <h2>Today's Temperature & Humidity
                    </h2>


                    <div class=" pull-right ">
                        <a href="pdf.php" class="btn btn-primary  bg-green pull-right" type="button">
                            Download DATA PDF
                        </a>
                    </div>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row" style="display: block">
                        <div class="col-xs-12   col-sm-12 col-md-4   col-lg-4    ">
                            <center>
                                <h1><?php echo $database->getStation()->getCity(); ?></h1>
                                <H1><?php echo $database->getStation()->getCountry(); ?></H1>
                                <h4>
                                    <?php echo Date('l d F Y ') ?>
                                </h4>
                                <?php if (isset($_SESSION['auth'])) { ?>
                                    <sub class="fa fa-edit ">
                                        <a href="settings.php"/edit"}}">Edit the station'informations</a>
                                    </sub>
                                <?php } ?></center>
                        </div>
                        <div class="col-xs-6   col-sm-6 col-md-4   col-lg-4  ">
                            <center>
                            <canvas id="cvs" width="80" height="230"></canvas>
                            </center>
                        </div>
                        <div class="col-xs-6   col-sm-6 col-md-4   col-lg-4  ">
                            <center>

                                <canvas id="openedCanvas" height="150" height="150"></canvas>
                                <div>                            
                                    <div class="donut-inner hidden-xs" style="  margin-top: -40%;margin-bottom: 100px;">
                                    <center><span ><?php echo $database->getToday_result()->getHumidity() ?> %</span>
                                        <h5>Humidity </h5>
                                    </center>
                                </div>
                                <div>                            
                                    <div class="donut-innerd hidden-sm hidden-md hidden-lg  "  style="  margin-top: -40%;margin-bottom: 100px;">
                                    <center style="font-size: 80%"><span  ><?php echo $database->getToday_result()->getHumidity() ?> %</span>
                                      <br/>  <span>Humidity</span>
                                    </center>
                                </div>
                                </div>
                            </center>

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>


<div class=" col-xm-12  col-xs-12  col-sm-6  col-md-6   col-lg-6  ">


    <div class="x_panel">
        <div class="x_title">
            <h2>Humidity
                <small>last <?php echo $database->getCount_day_results() ?> days</small>
            </h2>
            <button class="btn btn-primary  pull-right bg-green" type="button" id="download-pdf-bar">
                Download PDF
            </button>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">


            <div class="x_content ">
                <canvas id="barChart"></canvas>
            </div>

        </div>
        <div class="clearfix"></div>
    </div>


</div>


<div class=" col-xm-12  col-xs-12  col-sm-6  col-md-6   col-lg-6  ">


    <div class="x_panel">
        <div class="x_title">
            <h2>Temperature
                <small>last <?php echo $database->getCount_day_results() ?> days</small>
            </h2>

            <button class="btn btn-primary  pull-right bg-green" type="button" id="download-pdf-line">
                Download PDF
            </button>

            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="col-xm-12  col-xs-12   col-sm-12  col-md-12   col-lg-12  ">


                <div class="x_content">
                    <canvas id="lineChart"></canvas>
                </div>

            </div>
        </div>
        <div class="clearfix"></div>
    </div>

</div>
<?php include 'includes/scripts.php' ?>
</body>
</html>