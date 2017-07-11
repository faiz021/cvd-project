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
            
            <div class="page-header" style="display: inline-block;width:100%;">
                <div class="col-lg-10">
                   <h1>Patient <small>Select</small></h1>
                </div>
                <div class="col-lg-2">
                   <a href="RegisterPatient.php" class="btn btn-default" role="button" style="margin-top:20px;">Register New Patient</a>
                </div>
           </div>
            <div class="col-lg-12">
               
                <table class="table table-hover">
                            
                    <thead>
                        <th> Username </th>
                        <th> First Name </th>
                        <th> Last Name </th>
                        <th> Gender </th>
                        <th> Email </th>
                        <th> Mobile </th>
                        <th> Date Of Birth </th>
                    </thead>
                    
                    <tbody>
                <?php
                
                $PatientList = $LoggedUser->find_my_Patients();
                
                foreach($PatientList as $item)
                {
                    echo '<tr onclick="document.location = \'Calculate.php?patient='.$item->getEmail().'\';">';
                    echo '<td>'.$item->getUsername().'</td>';
                    echo '<td>'.$item->getFirst_Name().'</td>';
                    echo '<td>'.$item->getLast_Name().'</td>';
                    echo '<td>'.$item->getGender().'</td>';
                    echo '<td>'.$item->getEmail().'</td>';
                    echo '<td>'.$item->getMobile().'</td>';
                    echo '<td>'.$item->getDate_Of_Birth().'</td>';
                    echo'</tr>';
                }
                
                ?>
                    </tbody>
                </table>
                
                
            </div>
            
            
            
        </div>
        
        <?php include 'Footer.php'; ?>
        
    </body>
</html>