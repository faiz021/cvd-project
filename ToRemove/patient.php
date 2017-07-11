<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Patient extends DatabaseObject
{
    protected $table_name ="Patient"; 
    protected $id;
    protected $User_ID;
    protected $Doctor_ID;  
    protected static $db_fields = array('id', 'User_ID', 'Doctor_ID');
    
    function getId() { return $this->id; }
    function setId($id) {  $this->id = $id; }
    
    function getUser_ID() {  return $this->User_ID; }
    function setUser_ID($User_ID) { $this->User_ID = $User_ID; }
    
    function getDoctor_ID() { return $this->Doctor_ID; }
    function setDoctor_ID($Doctor_ID) { $this->Doctor_ID = $Doctor_ID; }

}