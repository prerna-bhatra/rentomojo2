<!DOCTYPE html>
<html>
<?php
require('head.php');
?>
<body>
	<div class="container">
		<h1>Login </h1>
		<form method="POST" action="">
			<label>Mobile Number</label>
			<input type="text" name="phnum">
			<input type="submit" name="login" class="btn btn-info" value="login">
		</form>
		<a href="signup.php" class="btn btn-dark">Create Account</a>
	</div>
</body>
</html>

<?php
if(isset($_POST['login']))
{
$phnum=$_POST['phnum'];
require('function.php');
$db=new DB_con();
$fetch=$db->login($phnum);
if($fetch)
{
	$row=mysqli_fetch_array($fetch);
	$_SESSION['num']=$row['phnum'];
	header("Location: index.php"); 
	//echo $_SESSION['num'];
}
}
?>


