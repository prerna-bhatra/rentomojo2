<!DOCTYPE html>
<html>
<?php
require('head.php');
?>
<body>
	<div class="container">
		<form method="POST" action="">
			<input type="text" name="phnum">
			<input type="submit" name="login" value="submit">
		</form>
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