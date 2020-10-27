<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <link rel="stylesheet" href="../assets/security_system/tether/tether.min.css">
    <link rel="stylesheet" href="../assets/security_system/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/security_system/bootstrap/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="../assets/security_system/bootstrap/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="../assets/security_system/theme/css/style.css">
    <link rel="stylesheet" href="../assets/security_system/mobirise/css/mbr-additional.css" type="text/css">


</head>
<body>
<?php 
session_start();
if (isset($_SESSION["falsh_error"]))
    include './includes/messages/flash_incorrect_password.php';
?>
<section class="mbr-section form1 cid-qJ3TuLqx5I" id="form1-c">


    <div class="container">
        <div class="row justify-content-center">
            <div class="title col-12 col-lg-8">
                <h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">
                    LOGIN FORM
                </h2>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="media-container-column col-lg-8" data-form-type="formoid">

                <form class="mbr-form" action="./auth.php" method="post" data-form-title="Mobirise Form"><input
                            type="hidden" name="email" data-form-email="true"
                            data-form-field="Email">
                    <div class="row row-sm-offset">
                        <div class="col-md-4 multi-horizontal" data-for="name">
                            <div class="form-group">
                                <label class="form-control-label mbr-fonts-style display-7"
                                       for="name-form1-c">EMAIL</label>
                                <input type="email" class="form-control" name="email" data-form-field="Name" required=""
                                       id="name-form1-c">
                            </div>
                        </div>
                        <div class="col-md-4 multi-horizontal" data-for="email">
                            <div class="form-group">
                                <label class="form-control-label mbr-fonts-style display-7"
                                       for="email-form1-c">PASSWORD</label>
                                <input type="password" class="form-control" name="password" data-form-field="Email"
                                       required="" id="email-form1-c">
                            </div>
                        </div>

                    </div>


                    <span class="input-group-btn"><button href="" type="submit"
                                                          class="btn btn-form btn-primary-outline display-7">LOGIN</button></span>
                </form>
            </div>
        </div>
    </div>
</section>


<script src="../assets/security_system/web/assets/jquery/jquery.min.js"></script>
<script src="../assets/security_system/popper/popper.min.js"></script>
<script src="../assets/security_system/tether/tether.min.js"></script>
<script src="../assets/security_system/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/security_system/smoothscroll/smooth-scroll.js"></script>
<script src="../assets/security_system/theme/js/script.js"></script>

</body>
</html>