<?php
session_start();
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'phonebook');
class DB_con
{
function __construct()
{
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
$this->dbh=$con;
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
}
//Data Insertion Function
    public function insert($fname,$emailid,$contactno,$dob)
    {
    $ret=mysqli_query($this->dbh,"insert into tblusers(FirstName,EmailId,ContactNumber,DOB) values('$fname','$emailid','$contactno','$dob')");
    return $ret;
    }
//Data read Function
public function fetchdata()
    {
    $result=mysqli_query($this->dbh,"select * from tblusers");
    return $result;
    }
//Data one record read Function
public function checkphonenumber($phnum)
    {
        //echo $phnum;
    $oneresult=mysqli_query($this->dbh,"select * from tblusers where ContactNumber=$phnum");
    return $oneresult;
    }
    public function fetchdataone($uid)
    {
        //echo $phnum;
    $oneresult=mysqli_query($this->dbh,"select * from tblusers where id=$uid");
    return $oneresult;
    }
//Data updation Function
public function update($name,$dob,$email,$contactno,$uid)
    {
    $updaterecord=mysqli_query($this->dbh,"update  tblusers set FirstName='$name',EmailId='$email',ContactNumber='$contactno', DOB='$dob' where id='$uid' ");
    return $updaterecord;
    }
//Data Deletion function Function
public function delete($rid)
    {
    $deleterecord=mysqli_query($this->dbh,"delete from tblusers where id=$rid");
    return $deleterecord;
    }
}
?>




