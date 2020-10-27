<?php
session_start();
require '../dataBase/Database.php';
include_once("../WdevSecurity/WdevSecurity.php");

$database = new Database();
$WdevS = WdevSecurity::getInstance();


if (!isset($_SESSION['auth']) || !$_SESSION['auth'] == true)
    header('location:login.php');
if (isset($_POST['oldPassword']) & isset($_POST['confermeNewPassword']) & isset($_POST['newPassword'])) {
    $done = false;
    $oldpasscrypte = $WdevS->encrypt($_POST['oldPassword'],'g','e','e','k','a','y','o','u','b');

    if(!$WdevS->testWdevS($_POST['newPassword'],'g','e','e','k','a','y','o','u','b'))
    
        $_SESSION['falsh_error'] = "resaisie le nouveau mot de passe";
    else
    {
        $newpasscrypte = $WdevS->encrypt($_POST['newPassword'],'g','e','e','k','a','y','o','u','b');
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


<!DOCTYPE html>
<html>

<?php include 'includes/head.php' ?>

<body>

<?php include 'includes/navbar.php' ?>


<section class="mbr-section form1 cid-qJ3TuLqx5I" id="form1-c">


    <div class="container">
        <div class="row justify-content-center">
            <div class="title col-12 col-lg-8">
                <h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">
                    change your password
                </h2>

            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="media-container-column col-lg-8" data-form-type="formoid">

                <form class="mbr-form" action="./settings.php" method="post">
                    <div class="row row-sm-offset">

                        <div class="col-md-4 multi-horizontal">
                            <div class="form-group">
                                <label class="form-control-label mbr-fonts-style display-7"
                                       for="email-form1-c">old password</label>
                                <input type="password" class="form-control" name="oldPassword"
                                       required="">
                            </div>
                        </div>

                    </div>
                    <div class="row row-sm-offset">

                        <div class="col-md-4 multi-horizontal">
                            <div class="form-group">
                                <label class="form-control-label mbr-fonts-style display-7">new password</label>
                                <input type="password" class="form-control" name="newPassword" id="newPassword"
                                       required="">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label mbr-fonts-style display-7">conferme new password</label>
                                <input type="password" class="form-control" name="confermeNewPassword" id="confermeNewPassword"
                                       required="">
                            </div>
                        </div>
                        <div class="col-md-4 multi-horizontal">
                            <label class="form-control-label mbr-fonts-style display-7">show password</label>
                            <input class="checkbox form-control display-7" type="checkbox" id="check">

                        </div>

                    </div>


                    <span class="input-group-btn">
                        <button href="" type="submit"
                                class="btn btn-form btn-primary-outline display-7">MODIFY</button></span>
                </form>
            </div>
        </div>
    </div>
</section>
<div>
    <?php if (isset($_SESSION["falsh_error"]) && $_SESSION["falsh_error"]) {
        include 'includes/messages/flash_incorrect_password.php';
    } ?></div>
</body>
<script src="../assets/security_system/web/assets/jquery/jquery.min.js"></script>

<script type='text/javascript'>
    $(document).ready(function () {
        $('#check').click(function () {
            $(this).is(':checked') ? $('#newPassword').attr('type', 'text') : $('#newPassword').attr('type', 'password');
            $(this).is(':checked') ? $('#confermeNewPassword').attr('type', 'text') : $('#confermeNewPassword').attr('type', 'password');
        });
    });
</script>

</html>

