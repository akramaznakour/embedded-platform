<?php
session_start();
require '../dataBase/Database.php';
include_once("../WdevSecurity/WdevSecurity.php");
$database = new Database();
$WdevS = WdevSecurity::getInstance();

$_SESSION['falsh_error'] = null;


if (!isset($_SESSION['auth']) && !$_SESSION['auth'] == 'auth')
    header('location:login.php');

if ($_POST['password']) {
 $passcrypte = $WdevS->encrypt($_POST['password'],'g','e','e','k','a','y','o','u','b');
    $auth = false;
    foreach ($database->getUsersData() as $user) {
        if ($user->getEmail() == $_SESSION['email'] && $user->getPassword() == $passcrypte) {    
            $auth = true;
            break;
        }
    }

    if ($auth) {
        if ($database->getSecuritySystem()->getAlarmStatus() == "True") {
            $database->turnOffAlarm();
            header('location:index.php');
        } else
            header('location:index.php');
    } else {
        $_SESSION['falsh_error'] = "Incorrect passowrd";
    }
}
header('location:index.php');


?>
