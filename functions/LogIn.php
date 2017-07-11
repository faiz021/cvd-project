<?php

session_start();

include '../includes/initialize.php';

//If username and password have been set:
if (isset($_POST['Username']) && isset($_POST['Password'])) {
    //Grab the username and password:
    $username = $_POST['Username'];
    $password = $_POST['Password'];

    
    $newUser = new User();
    $newUser = $newUser->attempt_login($username, $password);
    
    if($newUser == false)
    {
        echo 'Invalid username and password!';
    }
    elseif($newUser->getUser_type()=='Patient')
    {
        $_SESSION['timestamp'] = time();
        $_SESSION['patient'] = serialize($newUser);
        header('Location: ../Account.php');
    }
    else if($newUser->getUser_type()=='Doctor')
    {
        $_SESSION['timestamp'] = time();
        $_SESSION['doctor'] = serialize($newUser);
        header('Location: ../DoctorHome.php');
    }
    else
    {
        echo 'how the hell did this get echoed?';
    }
}
?>