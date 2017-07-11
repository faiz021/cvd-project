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
    $PatientEmail = $_GET["patient"];
    
    
    if(!isset($_SESSION['doctor']) && empty($_SESSION['doctor']))
    {
        if(isset($_SESSION['patient']) && !empty($_SESSION['patient']))
        {
            //ALlow patient to view
        }
        else
        {
            header('Location: ../index.php');
            die();
        }
    }
    elseif(!isset($PatientEmail) && empty($PatientEmail))
    {
        header('Location: ../DoctorHome.php');
        die();
    }
    else
    {
        $Patient = new User();
        $Patient = $Patient->find_by_email($PatientEmail);
        
        if(empty($Patient))
        {
            header('Location: ../DoctorHome.php');
            die();
        }
        $LoggedUser = new User();
        $LoggedUser = unserialize($_SESSION['doctor']);
    }
    
    include './includes/calculation.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Doctor Home</title>

        <?php include 'HeaderLinks.php'; ?>

        
        
        <script type="text/javascript">
            window.onload = function () 
            {
                var chart = new CanvasJS.Chart("chartContainer", 
                {
                    theme: "theme2",//theme1
//                    title:{ text: "Your CVD Risk Chart" },
                    axisY: { title: "Risk (%)" },
                    animationEnabled: true,
                    data: 
                            
                    
                    [{
                        type: "column",
                        dataPoints: [
                        //Add PHP loop here that outputs date and value of each patient data for that patient
                        <?php 
                        
                        if(isset($_SESSION['doctor']) && !empty($_SESSION['doctor']))
                        {
                            $PatientData = new patientdata();
                            $PatientDatas = $PatientData->get_Patient_Data($Patient->getID());
                            $Data = new patientdata();

                            foreach($PatientDatas as $Data)
                            {
                                echo  '{ label: "'.date('Y:m:d', strtotime($Data->getDateTime())).'",  y:'.$Data->getValue().'},';
                            }

                        }
                        else{ echo '{ label: "'.date('Y:m:d').'",  y:'.$_SESSION['result'].'},'; }
                        
                        ?>
                        ]
                    }]
                });
	chart.render();
}
        </script>

    </head>
    <body>

        <?php include 'NavBar.php'; ?>

        <div class="container body-content" >
            
            <div class="page-header" style="display: inline-block;width:100%;">
                <h1>Calculate <small>Risk - <?php if(isset($Patient) && !empty($Patient)) {echo $Patient->getUsername();} ?></small></h1>
           </div>
            <div class="col-lg-3">
               
                <form method="post" action="<?php echo $_SERVER['PHP_SELF'].'?patient='.$PatientEmail; ?>"> 

                    <div class="form-group">
                        <label for="gender" class="control-label">Gender</label>
                          <select name="gender" id="gender" class="form-control">
                              <option>Male</option>
                              <option>Female</option>
                          </select>       
                    </div>

                        
                    <div class="form-group">
                        <label for="age" class="control-label">Age</label>
                        <input type="number" class="form-control" id="age" name="age" placeholder="Age" max="74" min="30">      
                    </div>

                        
                    <div class="form-group">
                        <label for="cho" class="control-label">Cholesterol</label>
                        <div class="controls controls-group">   
                            <input type="number" class="form-control" id="cho" name="cholesterol" placeholder="mg/dl" min="0">    
                            <label for="ldlCheckbox" class="control-label"><input type="checkbox" id="ldlCheckbox" name="avgChol"> Use Average</label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="hdl" class="control-label">HDL-C</label>
                        <div class="controls controls-group">   
                            <input type="number" class="form-control" id="hdl" placeholder="mg/dl" name="hdl" min="0">
                            <label for="ldlCheckbox2" class="control-label"><input type="checkbox" id="ldlCheckbox2" name="avgHDL"> Use Average</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="bpsys" class="control-label">Blood Pressure</label>
                        <div class="controls controls-group">    
                            <input type="number" class="form-control" id="bpsys" placeholder="Systolic (mm Hg)" name="systolic" >
                            <input type="number" class="form-control" id="bpdias" placeholder="Diastolic (mm Hg)" name="diastolic">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="diabetes" >Diabetes?</label>
                        <select id="diabetes" class="form-control" name="isDiab">
                            <option id="yes">Yes</option>
                            <option id="no">No</option>
                        </select>       
                    </div>
                    
                    <div class="form-group">
                        <label for="smoker" class="control-label">Smoking status</label>
                        <select id="smoker" class="form-control" name="isSmoke">
                            <option>Non Smoker</option>
                            <option>Smoker</option>
                        </select>        
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="btnSubmit">Calculate</button>
                    </div>

                    <div class="form-group">
                        <label for="total" class="control-label" >Total:</label>
                        <input type="text" id="total" class="form-control" name="total" value="<?php if (isset($_SESSION['result'])) { echo $_SESSION['result']; } ?>">
                    </div>
                </form>
                
            </div>
            
            <div class="col-lg-9">
                
              <div id="chartContainer" style="height: 400px; width: 100%;"></div>
                
            </div>
        </div>
        
        <?php include 'Footer.php'; ?>
        
    </body>
</html>