<?php include 'Redirect.inc.php'; 

require 'Connect.inc.php';

if (!loggedin()) {
    //Check fields have been set:
    if (isset($_POST['username']) &&
            isset($_POST['password']) &&
            isset($_POST['confirm_password']) &&
            isset($_POST['firstname']) &&
            isset($_POST['surname'])) {
        //Assign fields their value:
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        
      
        $firstname = $_POST['firstname'];
        $surname = $_POST['surname'];

        //Check that all of the values are not null:
        if (!empty($username) && !empty($password) && !empty($confirm_password) &&
                !empty($firstname) && !empty($surname)) {
            //Check if values are not too long:
            if (strlen($username) <= 30 || strlen($password) <= 32 || strlen($firstname) <= 40 || strlen($surname) <= 40) {
                //Check both password are the same:
                if ($password == $confirm_password) {
                    
                     //Reverse the password:
                    $password = strrev($password);

                    //Add 'AJG' text to center of password:
                    $password = substr_replace($password, 'Alpha', strlen($password) / 2, 0);

                    //Hash the new password:
                    $password_hash = openssl_digest($password, 'sha512');

                    //Reverse the hash:
                    $password_hash = strrev($password_hash);
                    
                    //Check the username doesn't allready exist:
                    $query = "SELECT `Username` FROM `User` WHERE `Username` = `$username`";
                    
                    $query_run = mysql_query($query);
                    if (mysql_num_rows($query_run) == 0)
                        {
                        //Register the new user:                    prevent sql injection:
                        $query = "INSERT INTO `User` VALUES('', '" . mysql_real_escape_string($username) . "', '" . mysql_real_escape_string($password_hash) . "', '" . mysql_real_escape_string($firstname) . "', '" . mysql_real_escape_string($surname) . "', '', '', '', '')";
                        
                            echo $query;
                        //If Registered:
                        if ($query_run = mysql_query($query))
                                        {
                            //Redirect to last location:
                            header('Location: index.php');
                        } else
                        {
                            echo 'Registration failed!';
                        }
                    } else
                        echo 'Username ' . $username . ' allready exists!';
                } else
                    echo 'Passwords do not match!';
            } else
                echo 'One or more field length too long.';
        } else
            echo 'Please fill all fields!';
    }

    //Registration form:
    ?>

    <form action="index.php?PR=Register.php" method="POST">

        <!-- Values are set to PHP variables so the information is retained upon refresh (If they have been set):  -->
        Username: <br><input type="text" name="username" maxlength="30" value ="<?php if (isset($username)) {
        echo $username;
    } ?>"><br>
        Password: <br><input type="password" name="password" maxlength="32"><br>
        Confirm Password: <br><input type="password" name="confirm_password"><br>
        Firstname: <br><input type="text" name="firstname" maxlength="40" value="<?php if (isset($username)) {
        echo $firstname;
    } ?>"> <br>
        Surname: <br><input type="text" name="surname" maxlength="40" value="<?php if (isset($username)) {
        echo $surname;
    } ?>"> <br>

        <input type="submit" value="Register"><br>

    </form>

    <?php
} else if (loggedin()) {
    echo 'You\'re allready regstered and logged in!';
}
?>
