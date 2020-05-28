<!DOCTYPE html>
<html>
<?php
require('head.php');
?>
<body>
	<div class="container">
		<h1>Create Account</h1>
		<form method="POST" action="">
			<label>Mobile Number</label>
			<input type="text" name="phnum">
			<input type="submit" name="sign" class="btn btn-info" value="Create">
		</form>
		<a href="loginsignup.php" class="btn btn-dark">Login</a>
	</div>
</body>
</html>

<?php
if(isset($_POST['sign']))
{
$phnum=$_POST['phnum'];
require('function.php');
$db=new DB_con();
$fetch=$db->login($phnum);
$row=mysqli_num_rows($fetch);
//echo $row['phnum'];
if($row)
{
	echo "<script>alert('Number already existed please login');</script>";
	echo "<script>window.location.href='loginsignup.php'</script>";
	
}
else
{
	//echo "string";
	$sign=$db->signup($phnum);
	//echo $sign;
	if($sign)
	{
	echo "<script>alert('Account Creates please login');</script>";
	echo "<script>window.location.href='loginsignup.php'</script>";
	}

}

}
?>






