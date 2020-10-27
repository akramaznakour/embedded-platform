<?php
session_start();
require '../dataBase/Database.php';
include_once("../WdevSecurity/WdevSecurity.php");
$database = new Database();
$WdevS = WdevSecurity::getInstance();
if (isset($_POST['email']) && isset($_POST['password'])) {
    $passcrypte = $WdevS->encrypt($_POST['password'],'g','e','e','k','a','y','o','u','b');
    $auth = false;
    foreach ($database->getUsersData() as $user) {
        if ($user->getEmail() == $_POST['email'] && $user->getPassword() == $passcrypte) {
            $_SESSION['auth'] = "true";
            $_SESSION['email'] = $user->getEmail() ;
            $_SESSION['name'] = $user->getName();
            $auth = true;
        }
    }

    if ($auth)
        header('location:index.php');
    else {
        $_SESSION['falsh_error'] = "Incorrect passowrd or email";
        header('location:login.php');
    }


} else {
    header('location:index.php');
}