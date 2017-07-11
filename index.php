<?php session_start();

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
    
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>

        <?php include 'HeaderLinks.php'; ?>
        
    </head>
    <body>

        <?php include 'NavBar.php'; ?>

        <div class="container body-content">

            <div class="jumbotron" >
              
                <!--Slides-->
            <div class="carousel slide" id="tipsSlides">

                <ol class="carousel-indicators">
                    <li class="active" data-slide-to="0" data-target="#tipsSlides"></li>
                    <li data-slide-to="1" data-target="#tipsSlides"></li>

                </ol>

                <div class="carousel-inner">

                    <div class="item active" id="slide1">
                        <img src="img/veg.jpg">
                        <div class="carousel-caption">
                            <p style="color: black; font-size: medium; text-align: center">Find out how fruits and vegetables can prevent you from getting <br>Cardiovascular Disease.</p>
                            <p><a class="btn btn-primary btn-sm" href="http://www.nhs.uk/Conditions/Coronary-heart-disease/Pages/Prevention.aspx" role="button">Learn more</a></p>
                        </div>

                    </div>

                    <div class="item" id="slide2">
                        <img src="img/Exc.jpg">
                        <div class="carousel-caption">  
                            <p style="color: black; font-size: medium; text-align: center">Find out how regular exercise can prevent you from getting <br>Cardiovascular Disease.</p>
                            <p><a class="btn btn-primary btn-sm" href="http://www.webmd.com/heart-disease/guide/exercise-healthy-heart" role="button">Learn more</a></p>
                        </div>

                    </div>

                    <a class="left carousel-control" data-slide="prev" href="#tipsSlides"><span class="icon-prev" ></span></a>
                    <a class="right carousel-control" data-slide="next" href="#tipsSlides"><span class="icon-next" ></span></a>
                </div>
            </div>
            <!--Slides end-->
            
              <h1><small>NHS Cardiovascular Disease Risk Calculator</small></h1>
                
              
            </div>

            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Welcome</h3>
                    </div>
                    <div class="panel-body">
                        Welcome Message
                    </div>
                </div>
            </div>
            <!--Video-->

            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Watch</h3>
                    </div>   
                    <div class="panel-body"> 
                        <div class="embed-responsive embed-responsive-16by9 hidden-xs">      
                            <iframe src="//www.youtube.com/embed/7l8q7lQnPBg" frameborder="0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>

         <?php include 'Footer.php'; ?>

    </body>

</html>