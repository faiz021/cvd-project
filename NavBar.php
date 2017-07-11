<?php session_start(); ?>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="margin: 0px;">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            
            <?php 
                include './includes/initialize.php';
                if(isset($_SESSION['doctor']) && !empty($_SESSION['doctor'])) 
                    echo '<a class="navbar-brand Home" href="DoctorHome.php" style="color:white; font-weight: bold">CVD Risk Calculator</a>';
                elseif(isset($_SESSION['patient']) && !empty($_SESSION['patient'])) 
                    echo'<a class="navbar-brand Home" href="Calculate.php" style="color:white; font-weight: bold">CVD Risk Calculator</a>';
                else echo '<a class="navbar-brand Home" href="index.php" style="color:white; font-weight: bold">CVD Risk Calculator</a>';   
            ?>
            
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                
            </ul>
            
            <!--
                depending on login, another set of buttons should be available!
            -->
            
            
            <ul class="nav navbar-nav pull-right">
               
                <?php 
                
                
                $LoggedUser = new User();
                echoActiveClassIfRequestMatches("LogIn");
                if(isset($_SESSION['doctor']) && !empty($_SESSION['doctor'])) 
                {
                    echo '<li>
                    <a class="Account" href="Account.php"><span class="glyphicon glyphicon-user"></span> Hi, Docter ';
                    $LoggedUser = unserialize($_SESSION['doctor']);
                    echo $LoggedUser->getUsername();
                    echo '</a></li>';
                    echo '<li> <a class="LogOut" href="functions/LogOut.php">Log Out</a></li>';
                
                }
                elseif(isset($_SESSION['patient']) && !empty($_SESSION['patient'])) 
                {
                    echo '<li>
                    <a class="Account" href="Account.php"><span class="glyphicon glyphicon-user"></span> Hi, ';
                    $LoggedUser = unserialize($_SESSION['patient']);
                    echo $LoggedUser->getUsername();
                    echo '</a></li>';
                    echo '<li><a class="LogOut" href="functions/LogOut.php">Log Out</a></li>';
                }
                else
                {
                    echo '<li><a href="LogForm.php"><span class="glyphicon glyphicon-user"></span> Log In</a></li>';
                }
                
                ?>
                
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<?php

function echoActiveClassIfRequestMatches($requestUri) {
    $current_file_name = basename($_SERVER['REQUEST_URI'], ".php");

    if ($current_file_name == $requestUri)
        echo 'class="active"';
}
?>