<?php

session_start();

include '../includes/initialize.php';

$LoggedUser = new User();
$LoggedUser = unserialize($_SESSION['doctor']);

$DB = new MySQLDatabase();

$NewUser = new User();

$NewUser->setAddress($_POST['Address']);
$NewUser->setDate_Of_Birth($_POST['DOB']);
$NewUser->setEmail($_POST['Email']);
$NewUser->setFirst_Name($_POST['FirstName']);

$NewUser->setGender( $_POST['Gender']);

$NewUser->setLast_Name($_POST['LastName']);
$NewUser->setPhone($_POST['PhoneNumber']);
$NewUser->setMobile($_POST['MobileNumber']);
$NewUser->setUsername($_POST['Username']);
$NewUser->setUser_type($_POST['UserType']);
$NewUser->setPassword($DB->password_encrypt($_POST['Password']));
$NewUser->setDoctor_ID($LoggedUser->getid());

if($NewUser->create())
{
    header('Location: ../DoctorHome.php');

}
else
    echo 'nooo';
