<!DOCTYPE html>
<html>
<?php
require('head.php');
require ('function.php');
?>
<body>
	<div class="container" >
		<h1>Edit Contact Details</h1>
		<?php
			$db=new DB_con();
			$uid=$_GET['uid'];
			$fetch=$db->fetchdataone($uid);
		while($row=mysqli_fetch_array($fetch))
  		{
  			?>
		<form name="insertrecord" method="post">
			<div class="row">
			<div class="col-md-4"><b>First Name</b>
			<input type="text" name="firstname" class="form-control"  value="<?php echo $row['FirstName'] ?>"required>
			</div>
			<div class="col-md-4"><b>DOB</b>
			<input type="date" name="dob" class="form-control" value="<?php echo $row['DOB']  ?>">
			</div>
			</div>
			<div class="row">
			<div class="col-md-4"><b>Email id</b>
			<input type="email" name="emailid" class="form-control" value="<?php echo $row['EmailId'] ?>">
			</div>
			<div class="col-md-4"><b>Contactno</b>
			<input type="text" name="contactno" class="form-control" maxlength="10" value="<?php echo $row['ContactNumber'];  ?>" required>
			</div>
			</div>
			<div class="row" style="margin-top:1%">
			<div class="col-md-8">
			<input type="submit" name="update" value="Submit" class="btn btn-info">
			<a href="index.php" class="btn btn-info">Cancel</a>
			</div>
			</div>
			</form>
			<?php 
				} 
			?>
		</div>
	</body>
</html>
<?php
	if(isset($_POST['update']))
	{
		//echo "string";
		$name=$_POST['firstname'];
		$dob=$_POST['dob'];
		$email=$_POST['emailid'];
		$phnum=$_POST['contactno'];
		$upd=new DB_con();
		$upd2=$upd->update($name,$dob,$email,$phnum,$uid);
		if($upd2)
		{
			echo "<script>alert('Contact Details Updated');</script>";
			echo "<script>window.location.href='index.php'</script>";
		}
	}
?>



