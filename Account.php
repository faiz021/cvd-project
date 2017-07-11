<?php 

    session_start();
    
    if(time() - $_SESSION['timestamp'] > 900)
    {
	//Destroy session:
	session_unset();
	session_destroy();
	header('Location: \index.php');
        die();
    }
    else
    {
        $_SESSION['timestamp'] = time();
    }
    
    include './includes/initialize.php';
    $LoggedUser = new User();
    
    if(!isset($_SESSION['doctor']) && empty($_SESSION['doctor']))
    {
        if(time() - $_SESSION['timestamp'] > 900)
        {
            //Destroy session:
            session_unset();
            session_destroy();
            header('Location: \index.php');
            die();
        }
        else
        {
            $_SESSION['timestamp'] = time();
        }
    
         $LoggedUser = unserialize($_SESSION['doctor']);
    }
    elseif(!isset($_SESSION['patient']) && empty($_SESSION['patient']))
    {
         $LoggedUser = unserialize($_SESSION['patient']);
    }
    else
    {
       header('Location: ../index.php');
       die();
    }
    
    
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Account</title>

        <?php include 'HeaderLinks.php'; ?>

    </head>
    <body>

        <?php include 'NavBar.php'; ?>

        <div class="container body-content" >
            <div class="page-header">
                <h1>Account <small>Details</small></h1>
            </div>

            <div class="col-lg-6">
                <form action='functions/UpdateDetails.php' method='POST'>
                    <div class="form-group">
                        <label for="InputUsername">Username</label>
                        <input type="email" Name="Username" class="form-control" id="InputUsername" placeholder="Username" value="<?php echo $LoggedUser->getUsername() ?>">
                    </div>
                    <div class="form-group">
                        <label for="InputPassword">Password</label>
                        <input type="password" Name="Password" class="form-control" id="InputPassword" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="InputAddress">Address</label>
                        <input type="text" Name="Address" class="form-control" id="InputAddress" placeholder="Address" value="<?php echo $LoggedUser->getAddress() ?>">
                    </div>
                    <div class="form-group">
                        <label for="InputDOB">Date Of Birth</label>
                        <input type="date" Name="DOB" class="form-control" id="InputDOB" placeholder="Date Of Birth" value="<?php echo $LoggedUser->getDate_Of_Birth() ?>">
                    </div>
                    <div class="form-group">
                        <label for="InputEmail">Email</label>
                        <input type="email" Name="Email" class="form-control" id="InputEmail" placeholder="Email" value="<?php echo $LoggedUser->getEmail() ?>">
                    </div>
                    <div class="form-group">
                        <label for="InputFirstName">First Name</label>
                        <input type="text" Name="FirstName" class="form-control" id="InputFirstName" placeholder="First Name" value="<?php echo $LoggedUser->getFirst_Name() ?>">
                    </div>
                    <div class="form-group">
                        <label for="InputLastName">Last Name</label>
                        <input type="text" Name="LastName" class="form-control" id="InputLastName" placeholder="Last Name" value="<?php echo $LoggedUser->getLast_Name() ?>">
                    </div>
                    <div class="form-group">
                        <label for="InputGender">Gender</label>
                        <input type="text" Name="Gender" class="form-control" id="InputGender" placeholder="Gender" value="<?php echo $LoggedUser->getGender() ?>">
                    </div>
                    <div class="form-group">
                        <label for="InputPhoneNumber">Phone Number</label>
                        <input type="tel" Name="PhoneNumber" class="form-control" id="InputPhoneNumber" placeholder="Phone Number" value="<?php echo $LoggedUser->getPhone() ?>">
                    </div>
                    <div class="form-group">
                        <label for="InputMobileNumber">Mobile Number</label>
                        <input type="tel" Name="MobileNumber" class="form-control" id="InputMobileNumber" placeholder="Mobile Number" value="<?php echo $LoggedUser->getMobile() ?>">
                    </div>
                    <div class="form-group">
                    <button type="submit" class="btn btn-default" style="margin-top:10px">Update Details</button>
                    </div>
                </form>
            </div>
            
        </div>
        
        <?php include 'Footer.php'; ?>
        
    </body>
</html>

