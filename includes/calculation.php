<?php
    session_start();

    include 'initialize.php';
    
    $PatientEmail = $_GET["patient"];
    $Patient = new User();
    $Patient = $Patient->find_by_email($PatientEmail);
        
    if (isset($_POST['btnSubmit'])) {
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        $hdl = $_POST['hdl'];
        $chol = $_POST['cholesterol'];
        $syst = $_POST['systolic'];
        $dias = $_POST['diastolic'];
        $diab = $_POST['isDiab'];
        $smoke = $_POST['isSmoke'];

        $myarray = array($gender, $age, $chol, $syst, $smoke, $dias, $diab);
        
        //get user, ensure data is added to database

        if ($gender == "Male") {
            $user = new Male();

            //Set ATTR
            $user->setAge($age);
            $user->setChol($chol);
            $user->setHdl($hdl);
            $user->setDiab($diab);
            $user->setDias($dias);
            $user->setSmoker($smoke);
            $user->setSyst($syst);
            
            $user->performCalculation($gender);
            $results = $user->totalCalc();

            // print_r($user);
            
            $_SESSION['result'] = $results;
          
           // echo '<h1>' . $user->totalCalc() . " " . $gender . '</h1>';
            
            $x = percent::total_percent($results, $gender);
            
            //echo '<h1>'.$x.'</h1>';
            
        } else if ($gender == "Female") {
            $user = new Female();


            //Set ATTR
            $user->setAge($age);
            $user->setChol($chol);
            $user->setHdl($hdl);
            $user->setDiab($diab);
            $user->setDias($dias);
            $user->setSmoker($smoke);
            $user->setSyst($syst);

            $user->performCalculation($gender);
            $results = $user->totalCalc();
            //echo '<h1>' . $user->totalCalc() . " " . $gender . '</h1>';

            $x = percent::total_percent($results, $gender);

            $_SESSION['result'] = $results;
        }
        
        if(isset($_SESSION['doctor']) && !empty($_SESSION['doctor']))
        {
            $user->setUser_ID($Patient->getid());
            $user->setHDLCholesterol($hdl);
            $user->setCholesterol($chol);
            $user->setSystolic($syst);
            $user->setDiastolic($dias);
            $user->setDiabetics($diab);
            $user->setSmoker($smoke);
            $user->setValue($results);
            $user->setDateTime(date("Y-m-d H:i:s"));
            $user->create();
        }
    }