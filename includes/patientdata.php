<?php


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class patientdata extends DatabaseObject
{
    protected static $table_name="PatientData";
    protected $id;
    protected $User_ID;
    protected $HDLCholesterol;
    protected $Cholesterol;
    protected $Systolic;
    protected $Diastolic;
    protected $Diabetics;
    protected $Smoker;
    protected $Value;
    protected $DateTime;
    
     protected static $db_fields = array('id', 'User_ID', 'HDLCholesterol', 
            'Cholesterol', 'Systolic', 'Diastolic', 'Diabetics', 'Smoker',
            'Value','DateTime');
    
    static function getTable_name() {
        return self::$table_name;
    }
    function getHDLCholesterol() {
        return $this->HDLCholesterol;
    }

    function setHDLCholesterol($HDLCholesterol) {
        $this->HDLCholesterol = $HDLCholesterol;
    }

        function getId() {
        return $this->id;
    }

    function getUser_ID() {
        return $this->User_ID;
    }

    function getCholesterol() {
        return $this->Cholesterol;
    }

    function getSystolic() {
        return $this->Systolic;
    }

    function getDiastolic() {
        return $this->Diastolic;
    }

    function getDiabetics() {
        return $this->Diabetics;
    }

    function getSmoker() {
        return $this->Smoker;
    }

    function getValue() {
        return $this->Value;
    }

    function getDateTime() {
        return $this->DateTime;
    }

    static function setTable_name($table_name) {
        self::$table_name = $table_name;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setUser_ID($User_ID) {
        $this->User_ID = $User_ID;
    }

    function setCholesterol($Cholesterol) {
        $this->Cholesterol = $Cholesterol;
    }

    function setSystolic($Systolic) {
        $this->Systolic = $Systolic;
    }

    function setDiastolic($Diastolic) {
        $this->Diastolic = $Diastolic;
    }

    function setDiabetics($Diabetics) {
        $this->Diabetics = $Diabetics;
    }

    function setSmoker($Smoker) {
        $this->Smoker = $Smoker;
    }

    function setValue($Value) {
        $this->Value = $Value;
    }

    function setDateTime($DateTime) {
        $this->DateTime = $DateTime;
    }
    
    public static function get_Patient_Data($id) 
    {
        return static::find_by_sql("SELECT * FROM ".static::$table_name." WHERE User_ID=".$id);
    }
        
    protected $age;
    protected $chol;
    protected $hdl;
    protected $syst;
    protected $dias;
    protected $diab;
    protected $smokery;
    //CHol Points 

    protected $age_chol_points;
    protected $chol_chol_points;
    protected $hdl_chol_points;
    protected $syst_chol_points;
    protected $dias_chol_points;
    protected $diab_chol_points;
    protected $smoker_chol_points;

    function getAge() {
        return $this->age;
    }

    function getChol() {
        return $this->chol;
    }

    function getHdl() {
        return $this->hdl;
    }

    function getSyst() {
        return $this->syst;
    }

    function getDias() {
        return $this->dias;
    }

    function getDiab() {
        return $this->diab;
    }

    function getSmokery() {
        return $this->smokery;
    }

    function setAge($age) {
        $this->age = $age;
    }

    function setChol($chol) {
        $this->chol = $chol;
    }

    function setHdl($hdl) {
        $this->hdl = $hdl;
    }

    function setSyst($syst) {
        $this->syst = $syst;
    }

    function setDias($dias) {
        $this->dias = $dias;
    }

    function setDiab($diab) {
        $this->diab = $diab;
    }

    function setSmokery($smoker) {
        $this->smokery = $smoker;
    }

    function getAge_chol_points() {
        return $this->age_chol_points;
    }

    function getChol_chol_points() {
        return $this->chol_chol_points;
    }

    function getHdl_chol_points() {
        return $this->hdl_chol_points;
    }

    function getSyst_chol_points() {
        return $this->syst_chol_points;
    }

    function getDias_chol_points() {
        return $this->dias_chol_points;
    }

    function getDiab_chol_points() {
        return $this->diab_chol_points;
    }

    function getSmoker_chol_points() {
        return $this->smoker_chol_points;
    }

    function setAge_chol_points($age_chol_points) {
        $this->age_chol_points = $age_chol_points;
    }

    function setChol_chol_points($chol_chol_points) {
        $this->chol_chol_points = $chol_chol_points;
    }

    function setHdl_chol_points($hdl_chol_points) {
        $this->hdl_chol_points = $hdl_chol_points;
    }

    function setSyst_chol_points($syst_chol_points) {
        $this->syst_chol_points = $syst_chol_points;
    }

    function setDias_chol_points($dias_chol_points) {
        $this->dias_chol_points = $dias_chol_points;
    }

    function setDiab_chol_points($diab_chol_points) {
        $this->diab_chol_points = $diab_chol_points;
    }

    function setSmoker_chol_points($smoker_chol_points) {
        $this->smoker_chol_points = $smoker_chol_points;
    }

    function totalCalc() {
        $total = $this->getAge_chol_points();
        $total += $this->getChol_chol_points();
        $total += $this->getDiab_chol_points();
        $total += $this->getDias_chol_points();
        $total += $this->getSmoker_chol_points();
        $total += $this->getSyst_chol_points();
        $total += $this->getHdl_chol_points();

        return $total;
    }
    
    
    
    function performCalculation($gender){
        $this->setAge_chol_points(CholPoints::chol_points_age($this->getAge(), $gender));
        $this->setChol_chol_points(CholPoints::cholesterol_chol_points($this->getChol(), $gender));
        $this->setHdl_chol_points(CholPoints::hdl_chol_points($this->getHdl(), $gender));
        $this->setDiab_chol_points(CholPoints::diabetes_chol_points($this->getDiab(), $gender));
        $this->setDias_chol_points(CholPoints::diastolic_chol_points($this->getDias(), $gender));
        $this->setSmoker_chol_points(CholPoints::smoker_chol_points($this->getSmoker(), $gender)); 
        $this->setSyst_chol_points(CholPoints::systolic_chol_points($this->getSyst(), $gender));
    }

}
