<?php
class DBConnect {
    private $db = NULL;

    const DB_SERVER = "localhost";
    const DB_USER = "root";
    const DB_PASSWORD = "";
    const DB_NAME = "covid-19";

    public function __construct() {
        $dsn = 'mysql:dbname=' . self::DB_NAME . ';host=' . self::DB_SERVER;
        try {
            $this->db = new PDO($dsn, self::DB_USER, self::DB_PASSWORD);
        } catch (PDOException $e) {
            throw new Exception('Connection failed: ' .
            $e->getMessage());
        }
        return $this->db;
    }
    public function auth(){
        session_start();
        if(! isset($_SESSION['username'])){
            header("Location: index.php");
        }       
    }
    public function authLogin(){
        session_start();
        if(isset($_SESSION['username'])){
            header("Location: employee.php");
        }
    }
    
    public function checkAuth(){
        session_start();
        if(! isset($_SESSION['username'])){
            return false;
        } else {
            return true;
        }
    }
    public function adminlogin($username, $password){
        $stmt = $this->db->prepare("SELECT * FROM admin WHERE username=? AND password=?");
        $stmt->execute([$username,$password]);
        if($stmt->rowCount() > 0){
            session_start();
            $emp = $stmt->fetchAll();
            foreach($emp as $e){
                $_SESSION['id'] = $e['ID'];
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                
            }
            
            return true;
        } else {
            return false;
        }
    }
    public function employeelogin($username, $password){
        $stmt = $this->db->prepare("SELECT * FROM employeedetails WHERE uname=? AND psw=?");
        $stmt->execute([$username,$password]);
        if($stmt->rowCount() > 0){
            session_start();
            $emp = $stmt->fetchAll();
            foreach($emp as $e){
                $_SESSION['uname'] = $username;
                $_SESSION['psw'] = $password;
                
            }
            
            return true;
        } else {
            return false;
        }
    }

    public function addEmployee($uname,$psw,$fname,$mname,$lname,$sex,$mail,$mobile,$haddress,$city,$hstate,$pincode){
$stmt = $this->db->prepare("INSERT INTO employeedetails (uname,psw,fname,mname,lname,sex,email,mobile,haddress,city,hstate,pincode)"
        . "VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
$stmt->execute([$uname,$psw,$fname,$mname,$lname,$sex,$mail,$mobile,$haddress,$city,$hstate,$pincode]);
return true;

}

public function addreport($fname,$mname,$lname,$sex,$mail,$mobile,$haddress,$city,$hstate,$pincode,$dob,$dov,$bg){
    $stmt = $this->db->prepare("INSERT INTO register (fname,mname,lname,sex,email,mobile,haddress,city,hstate,pincode,dob,dov,bg)"
            . "VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $stmt->execute([$fname,$mname,$lname,$sex,$mail,$mobile,$haddress,$city,$hstate,$pincode,$dob,$dov,$bg]);
    return true;
    
    }

    public function reportdeatils($mobile, $dob){
        $stmt = $this->db->prepare("SELECT * FROM register WHERE mobile=? AND dob=?");
        $stmt->execute([$mobile,$dob]);
        return $stmt->fetchAll();
    }
    
    public function getReportById($id){
        $stmt = $this->db->prepare("SELECT * FROM register WHERE ID=?");
        $stmt->execute([$id]);
        return $stmt->fetchAll();
    }
    public function getEmployees(){
        $stmt = $this->db->prepare("SELECT * FROM employeedetails");
        $stmt->execute();
        return $stmt->fetchAll();
    }

}
?>