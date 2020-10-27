<!DOCTYPE html>
<html lang="en">
<head>
     <?php include 'includes/head.php' ?>
</head>

<body style="background-color: #F7F7F7">
<div class="container body">
    <div class="nav_menu" style="height: 50px">
        <ul class="nav navbar-nav navbar-left">
            <a href="<?php echo "index.php"; ?>" style="height : 50px ;padding: 15px 25px"
               class=" pull-left">
                <span class="badge bg-green">HOME <i class="fa fa-home "></i></span>
            </a>
        </ul>
    </div>
    <!-- page content -->
    <div class="right_col" style="margin-top: 70px;" role="main">


        <div class=" col-xm-12  col-xs-12  col-sm-6  col-md-6   col-lg-6  col-lg-offset-3  col-md-offset-3  ">


            <div class="x_panel">
                <div class="x_title">
                    <h2>LOGIN
                    </h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">

                            <div class="panel-body">
                                <form class="form-horizontal" method="POST" action="auth.php">

                                    <div class="form-group">
                                        <label for="email" class="col-xs-4 col-sm-4 col-md-4 col-lg-4 control-label">E-Mail
                                            Address</label>

                                        <div class="col-md-6 col-xs-6 col-sm-6  col-lg-6 ">
                                            <input id="email" type="email" class="form-control" name="email"
                                                   required autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="password" class="col-xs-4 col-sm-4 col-md-4 col-lg-4 control-label">Password</label>

                                        <div class="col-md-6 col-xs-6 col-sm-6  col-lg-6 ">
                                            <input id="password" type="password" class="form-control"
                                                   name="password" required>
                                        </div>
                                    </div>


                                    <hr/>
                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-md-6 col-lg-6 ">
                                                <button type="submit" class="btn btn-primary">
                                                    Login
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>