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
 
        <div class="container body-content" >
            <div class="page-header">
                <h1>Login <small>CVD Calculator</small></h1>
            </div>

            <div class="col-lg-6">
                <form action='/functions/LogIn.php' method='POST'>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="email" Name="Username" class="form-control" id="exampleInputEmail1" placeholder="Username (Email)">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" Name="Password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-default" style="margin-top:10px">Log In</button>
                    </div>
                </form>
            </div>

        </div>
        
        <?php include 'Footer.php'; ?>
        
    </body>
</html>

