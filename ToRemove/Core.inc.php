<?php

    ob_start();
    session_start();
    $current_file = $_SERVER['SCRIPT_NAME'];

    //??says undefined??:
    if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER']))
            $http_referer = $_SERVER['HTTP_REFERER'];

    function loggedin()
    {
            if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
            {
                    if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) // 30 minutes = 1800 (1 sec = 1)
                    {
                    // last request was more than 30 minutes ago
                    session_unset();     // unset $_SESSION variable for the run-time
                    session_destroy();   // destroy session data in storage

                    return false;
                    }

                    $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp

                    return true;
            }
            else 
            {
                    //echo ' Not logged in';
                    return false;
            }	
    }

    //NEED TO CALL BASED ON ACCONT TYPE VARIABLE
    function getuserfield($field, $AT)
    {

            $query = "SELECT `$field` FROM `User` WHERE `User_ID` = '".$_SESSION['user_id']."'";

            if($query_run = mysql_query($query))
            {
                    if($query_result = mysql_result($query_run, 0, $field))
                            return $query_result;
            }
    }

    //NEED TO CHECK NEW ACCOUNT TYPE VARIABLE
    function getpage($PR, $AT)
    {
        if(loggedin())
        {
                if(strpos($PR, "/") !== false)
                {
                        if(substr($PR,0,strrpos($PR, "/")) <> $AT)
                                include 'DocterHome.html';
                        else include $PR;
                }
                else include $PR;
        }
        else
        {
                if(strpos($PR, "/") !== false || $PR == 'DocterHome.html')
                        include 'Home.html';
                else include $PR;
        }
    }
?>