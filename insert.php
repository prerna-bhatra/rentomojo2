<!DOCTYPE html>
<html>
<?php
require('head.php')
?>
<body>
<div class="container" >
	<h1>Add Contact Number</h1>
<form name="insertrecord" method="post">
<div class="row">
<div class="col-md-4"><b>First Name</b>
<input type="text" name="firstname" class="form-control" required>
</div>
<div class="col-md-4"><b>DOB</b>
<input type="date" name="dob" class="form-control" required>
</div>
</div>
<div class="row">
<div class="col-md-4"><b>Email id</b>
<input type="email" name="emailid" class="form-control" required>
</div>
<div class="col-md-4"><b>Contactno</b>
<input type="text" name="contactno" class="form-control" maxlength="10" required>
</div>
</div>
<div class="row" style="margin-top:1%">
<div class="col-md-8">
<input type="submit" name="insert" value="Submit" class="btn btn-info">
<a href="index.php" class="btn btn-info">Cancel</a>
</div>
</div>
</form>
</div>
<?php
// include database connection file
require_once'function.php';
// Object creation
$insertdata=new DB_con();
if(isset($_POST['insert']))
{
// Posted Values
$fname=$_POST['firstname'];
$emailid=$_POST['emailid'];
$contactno=$_POST['contactno'];
$dob=$_POST['dob'];
//Function Calling
 if(! preg_match('/^[7-9][0-9]{9}+$/', $contactno))
    {
      echo "<script>alert('invalid phone number');</script>";

    }
    else
    {
$sql=$insertdata->insert($fname,$emailid,$contactno,$dob);
if($sql)
{
// Message for successfull insertion
echo "<script>alert('Record inserted successfully');</script>";
echo "<script>window.location.href='index.php'</script>";
}
else
{
// Message for unsuccessfull insertion
echo "<script>alert('phone number aleardy exixts');</script>";

}
}
}
?>
</body>
</html>