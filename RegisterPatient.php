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
    
    if(!isset($_SESSION['doctor']) && empty($_SESSION['doctor']))
    {
         header('Location: ../index.php');
         die();
    }
    else
    {
        include './includes/initialize.php';
        
        $LoggedUser = new User();
        $LoggedUser = unserialize($_SESSION['doctor']);
    }
    
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Doctor Home</title>

        <?php include 'HeaderLinks.php'; ?>

    </head>
    <body>

        <?php include 'NavBar.php'; ?>

        <div class="container body-content" >
            <div class="page-header">
                <h1>Calculator <small>Doctor</small></h1>
            </div>
            
            

            <div class="col-lg-6">
               
                <form action='/functions/Register.php' method='POST'>
                     <div class="form-group">
                        <label for="InputUsername">Username</label>
                        <input type="text" Name="Username" class="form-control" id="InputUsername" placeholder="Username" Value=" ">
                    </div>
                    <div class="form-group">
                        <label for="InputPassword">Password</label>
                        <input type="password" Name="Password" class="form-control" id="InputPassword" placeholder="Password" Value=" ">
                    </div>
                    <div class="form-group">
                        <label for="InputAddress">Address</label>
                        <input type="text" Name="Address" class="form-control" id="InputAddress" placeholder="Address" Value=" ">
                    </div>
                    <div class="form-group">
                        <label for="InputDOB">Date Of Birth</label>
                        <input type="date" Name="DOB" class="form-control" id="InputDOB" placeholder="Date Of Birth" Value=" ">
                    </div>
                    <div class="form-group">
                        <label for="InputEmail">Email</label>
                        <input type="email" Name="Email" class="form-control" id="InputEmail" placeholder="Email" Value=" ">
                    </div>
                    <div class="form-group">
                        <label for="InputFirstName">First Name</label>
                        <input type="text" Name="FirstName" class="form-control" id="InputFirstName" placeholder="First Name" Value=" ">
                    </div>
                    <div class="form-group">
                        <label for="InputLastName">Last Name</label>
                        <input type="text" Name="LastName" class="form-control" id="InputLastName" placeholder="Last Name" Value=" ">
                    </div>
                    <div class="form-group">
                        <label for="InputGender">Gender</label>
                        <select Name="Gender" class="form-control" id="InputGender">
                            <option id="Male">M</option>
                            <option id="Female">F</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="InputPhoneNumber">Phone Number</label>
                        <input type="tel" Name="PhoneNumber" class="form-control" id="InputPhoneNumber" placeholder="Phone Number" Value=" ">
                    </div>
                    <div class="form-group">
                        <label for="InputMobileNumber">Mobile Number</label>
                        <input type="tel" Name="MobileNumber" class="form-control" id="InputMobileNumber" placeholder="Mobile Number" Value=" ">
                    </div>
                    <div class="form-group">
                        <input type=hidden name=UserType value="Patient">
                        <button type="submit" class="btn btn-default" style="margin-top:10px">Register New Patient</button>
                    </div>
                    
                </form>
                
                
            </div>
            
        </div>
        
        <?php include 'Footer.php'; ?>
        
    </body>
</html>

