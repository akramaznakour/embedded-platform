<?php

require '../dataBase/Database.php';
include_once("../WdevSecurity/WdevSecurity.php");

$database = new Database();

session_start();
if (!isset($_SESSION['auth']) && !$_SESSION['auth'] == true)
    header('location:index.php');

if (isset($_POST['city']) || isset($_POST['country']) || isset($_POST['number_lines']) || isset($_POST['intervalbtwn2mesure'])) {
    if ($_POST['number_lines'] < 0 || $_POST['intervalbtwn2mesure'] < 60 || $_POST['intervalbtwn2mesure'] > 3600) header('location:settings.php');
    else
        $database->updateStation($_POST['country'], $_POST['city'], $_POST['number_lines'], $_POST['intervalbtwn2mesure']);
}
if (isset($_POST['delete'])) {
    if ($_POST['delete'] = true) {
        $database->deleteAll();
        header('location:index.php');
    }
}


$WdevS = WdevSecurity::getInstance();


if (!isset($_SESSION['auth']) || !$_SESSION['auth'] == true)
    header('location:login.php');
if (isset($_POST['oldPassword']) & isset($_POST['confermeNewPassword']) & isset($_POST['newPassword'])) {
    $done = false;
    $oldpasscrypte = $WdevS->encrypt($_POST['oldPassword'], 'g', 'e', 'e', 'k', 'a', 'y', 'o', 'u', 'b');

    if (!$WdevS->testWdevS($_POST['newPassword'], 'g', 'e', 'e', 'k', 'a', 'y', 'o', 'u', 'b'))

        $_SESSION['falsh_error'] = "resaisie le nouveau mot de passe";
    else {
        $newpasscrypte = $WdevS->encrypt($_POST['newPassword'], 'g', 'e', 'e', 'k', 'a', 'y', 'o', 'u', 'b');
        foreach ($database->getUsersData() as $user) {
            if ($user->getEmail() == $_SESSION['email'] && $user->getPassword() == $oldpasscrypte && $_POST['newPassword'] == $_POST['confermeNewPassword']) {
                $newUserData = new User($user->getId(), $user->getName(), $user->getEmail(), $newpasscrypte);
                $database->modifyUserData($newUserData);
                $done = true;
                break;
            }
        }
    }


    if ($done) {
        header('location:logout.php');
    } else {
        $_SESSION['falsh_error'] = "Incorrect passowrd";
    }
}

?>


<html>
<head>
    <?php include 'includes/head.php' ?>
</head>

<body style="background-color: #F7F7F7">
<div class="container body">

    <?php include('includes/navigation.php') ?>
    <!-- page content -->
    <div class="right_col" style="margin-top: 70px;" role="main">


        <div class=" col-xm-12  col-xs-12  col-sm-6  col-md-6   col-lg-6   ">


            <div class="x_panel">
                <div class="x_title">
                    <h2> Station settings
                    </h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">

                        <div class="panel-body">
                            <form class="form-horizontal" method="POST"
                                  action="settings.php">

                                <div class="form-group">
                                    <label for="city"
                                           class="col-xs-4 col-sm-4 col-md-4 col-lg-4 control-label">City</label>

                                    <div class="col-md-6 col-xs-6 col-sm-6  col-lg-6 ">
                                        <input type="text" class="form-control" name="city"
                                               value="<?php echo $database->getStation()->getCity() ?>" required
                                               autofocus>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for="country" class=" col-xs-4 col-sm-4 col-md-4 col-lg-4 control-label">
                                        Country</label>

                                    <div class="col-md-6 col-xs-6 col-sm-6  col-lg-6 ">
                                        <input type="text" class="form-control" name="country"
                                               value="<?php echo $database->getStation()->getCountry() ?>"
                                               required>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for="country" class=" col-xs-4 col-sm-4 col-md-4 col-lg-4 control-label">
                                        number of records</label>

                                    <div class="col-md-6 col-xs-6 col-sm-6  col-lg-6 ">
                                        <input type="number" min="0" class="form-control" name="number_lines"
                                               value="<?php echo $database->getStation()->getNumberLines() ?>"
                                               required>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for="country" class=" col-xs-4 col-sm-4 col-md-4 col-lg-4 control-label">
                                        number of sec</label>

                                    <div class="col-md-6 col-xs-6 col-sm-6  col-lg-6 ">
                                        <input type="number" min="60" max="3600" class="form-control"
                                               name="intervalbtwn2mesure"
                                               value="<?php echo $database->getStation()->getIntervalbtwn2mesure() ?>"
                                               required>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-md-8  col-sm-offset-4  col-xs-offset-4  col-md-offset-4 col-lg-offset-4 ">
                                        <button type="submit" class="btn btn-success">Save</button>

                                    </div>
                                </div>
                            </form>
                            <hr/>
                            <form class="form-horizontal" method="POST"
                                  action="settings.php">
                                <input type="hidden" name="delete" value="true">

                                <div class="form-group">
                                    <div class="col-md-8  col-sm-offset-4  col-xs-offset-4  col-md-offset-4 col-lg-offset-4 ">

                                        <button type="submit" class="btn btn-primary"
                                                onclick="return confirm('Are you sure you want to delete all the data  ?')">
                                            DELETE ALL DATA
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class=" col-xm-12  col-xs-12  col-sm-6  col-md-6   col-lg-6   ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>User settings </h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
                    <form class="form-horizontal form-label-left input_mask" method="POST"
                          action="settings.php">

                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4 col-xs-12">old password</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control" type="password" name="oldPassword">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4 col-xs-12">new password </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="newPassword" class="form-control" type="password" name="newPassword">
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4 col-xs-12">conferme new password </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="confermeNewPassword" class="form-control" type="password"
                                       name="confermeNewPassword">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4 col-xs-12"> show password </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <input class="checkbox" type="checkbox" id="check">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">

                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>

                        </div>
                        <div class="ln_solid "></div>
                        <?php if (isset($_SESSION["falsh_error"]) && $_SESSION["falsh_error"]) { ?>

                        <h1 style="text-align:center"><?php echo $_SESSION["falsh_error"]; $_SESSION["falsh_error"]="";?></h1>
                        <?php } ?>
                    </form>
                </div>
            </div>
        </div>


    </div>
</div>
</body>

<!-- jQuery -->
<script src="../assets/weather_station/js/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../assets/weather_station/js/bootstrap.min.js"></script>
<script type='text/javascript'>
    $(document).ready(function () {
        $('#check').click(function () {
            $(this).is(':checked') ? $('#newPassword').attr('type', 'text') : $('#newPassword').attr('type', 'password');
            $(this).is(':checked') ? $('#confermeNewPassword').attr('type', 'text') : $('#confermeNewPassword').attr('type', 'password');
        });
    });
</script>
</html>