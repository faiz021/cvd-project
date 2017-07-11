<?php

class User extends DatabaseObject
{

    protected static $table_name="User";
    protected $id;
    protected $Username;
    protected $Password;
    protected $First_Name;
    protected $Last_Name;
    protected $Email;
    protected $Phone;
    protected $Mobile;
    protected $Address;
    protected $Date_Of_Birth;
    protected $Gender;
    protected $user_type;
    protected $Doctor_ID;
    
    
    protected static $db_fields = array('id', 'Username', 'Password', 
            'First_Name', 'Last_Name', 'Email', 'Phone', 'Mobile',
            'Address','Date_Of_Birth', 'Gender', 'user_type', 'Doctor_ID');

    function getid() { return $this->id; }
    function getUsername() { return $this->Username; }
    function getPassword() { return $this->Password; }
    function getFirst_Name() { return $this->First_Name; }
    function getLast_Name() { return $this->Last_Name; }
    function getEmail() { return $this->Email; }
    function getPhone() { return $this->Phone; }
    function getMobile() { return $this->Mobile; }
    function getAddress() { return $this->Address; }
    function getDate_Of_Birth() { return $this->Date_Of_Birth; }
    function getGender() { return $this->Gender; }
    function getUser_type() {  return $this->user_type; }
    
    function setid($id) { $this->id = $id; }
    function setUsername($Username) { $this->Username = $Username; }
    function setPassword($Password) { $this->Password = $Password; }
    function setFirst_Name($First_Name) { $this->First_Name = $First_Name; }
    function setLast_Name($Last_Name) { $this->Last_Name = $Last_Name; }
    function setEmail($Email) { $this->Email = $Email; }
    function setPhone($Phone) { $this->Phone = $Phone; }
    function setMobile($Mobile) { $this->Mobile = $Mobile; }
    function setAddress($Address) { $this->Address = $Address; }
    function setDate_Of_Birth($Date_Of_Birth) { $this->Date_Of_Birth = $Date_Of_Birth; }
    function setGender($Gender) { $this->Gender = $Gender; }
    function setUser_type($user_type) {  $this->user_type = $user_type;  }
     
    function getDoctor_ID() { return $this->Doctor_ID; }
    function setDoctor_ID($Doctor_ID) { $this->Doctor_ID = $Doctor_ID; }
    
    public static function find_by_email($mail="")
    {
        global $database;
        $email = $database->escape_value($mail);
        $sql  = "SELECT * FROM ".static::$table_name. " ";
        $sql .= "WHERE Email = '{$email}' ";
        $sql .= "LIMIT 1";
        $result_array = self::find_by_sql($sql);
        return !empty($result_array) ? array_shift($result_array) : false;
    }

    function attempt_login($email, $password)
    {
        global $database;
        $user = User::find_by_email($email);
        if ($user) // found user, now check password
        {
            if ($database->password_check($password, $user->getPassword()))
                return $user; // password matches
            else
                return false; // password does not match
        } 
        else return false; // user not found
    }
    
    public static function find_all_Patients() {
        return static::find_by_sql("SELECT * FROM ".static::$table_name." WHERE user_type=1 " );
    }
    
    public function find_my_Patients() {
        return static::find_by_sql("SELECT * FROM ".static::$table_name." WHERE user_type=1 AND Doctor_ID=".$this->id);
    }
    
    public static function find_all_Doctors() {
        return static::find_by_sql("SELECT * FROM ".static::$table_name." WHERE user_type=2 " );
    }
}

?>