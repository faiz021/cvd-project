<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//include './calcuate.php';
//include './CholPoints.php';


class Female extends patientdata {
    
    public static $gender = "Female";
  
    public function getAge() {
        return parent::getAge();
    }

    public function getAge_chol_points() {
        return parent::getAge_chol_points();
    }

    public function getChol() {
        return parent::getChol();
    }

    public function getChol_chol_points() {
        return parent::getChol_chol_points();
    }

    public function getDiab() {
        return parent::getDiab();
    }

    public function getDiab_chol_points() {
        return parent::getDiab_chol_points();
    }

    public function getDias() {
        return parent::getDias();
    }

    public function getDias_chol_points() {
        return parent::getDias_chol_points();
    }

    public function getHdl() {
        return parent::getHdl();
    }

    public function getHdl_chol_points() {
        return parent::getHdl_chol_points();
    }

    public function getSmokery() {
        return parent::getSmokery();
    }

    public function getSmoker_chol_points() {
        return parent::getSmoker_chol_points();
    }

    public function getSyst() {
        return parent::getSyst();
    }

    public function getSyst_chol_points() {
        return parent::getSyst_chol_points();
    }

    public function setAge($age) {
        parent::setAge($age);
    }

    public function setAge_chol_points($age_chol_points) {
       // $age_chol_points = CholPoints::chol_points_age($age_chol_points, Female::$gender);
        parent::setAge_chol_points($age_chol_points);
    }

    public function setChol($chol) {
        parent::setChol($chol);
    }

    public function setChol_chol_points($chol_chol_points) {
      //  $chol_chol_points = CholPoints::cholesterol_chol_points($chol_chol_points, Female::$gender);
        parent::setChol_chol_points($chol_chol_points);
    }

    public function setDiab($diab) {
        parent::setDiab($diab);
    }

    public function setDiab_chol_points($diab_chol_points) {
        //$diab_chol_points = CholPoints::diabetes_chol_points($diab_chol_points, Female::$gender);
        parent::setDiab_chol_points($diab_chol_points);
    }

    public function setDias($dias) {
        parent::setDias($dias);
    }

    public function setDias_chol_points($dias_chol_points) {
       // $dias_chol_points = CholPoints::diastolic_chol_points($dias_chol_points, Female::$gender);
        parent::setDias_chol_points($dias_chol_points);
    }

    public function setHdl($hdl) {
        parent::setHdl($hdl);
    }

    public function setHdl_chol_points($hdl_chol_points) {
      //  $hdl_chol_points = CholPoints::hdl_chol_points($hdl_chol_points, Female::$gender);
        parent::setHdl_chol_points($hdl_chol_points);
    }

    public function setSmokery($smoker) {       
        parent::setSmokery($smoker);
    }

    public function setSmoker_chol_points($smoker_chol_points) {  
       // $smoker_chol_points = CholPoints::smoker_chol_points($smoker_chol_points, Female::$gender);
        parent::setSmoker_chol_points($smoker_chol_points);
    }

    public function setSyst($syst) {     
        parent::setSyst($syst);
    }

    public function setSyst_chol_points($syst_chol_points) {
      //  $syst_chol_points = CholPoints::systolic_chol_points($syst_chol_points, Female::$gender);
        parent::setSyst_chol_points($syst_chol_points);
    }

}
