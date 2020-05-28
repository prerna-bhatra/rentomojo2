<!DOCTYPE html>
<html>
<?php
require('head.php');
require('function.php')

?>
<body>
	<div class="container">
		<h4>My Contact List</h4>
	<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>DOB</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $fetchdata=new DB_con();
                    $sql=$fetchdata->fetchdata();
                     $cnt=1;
                      while($row=mysqli_fetch_array($sql))
                      {
                      ?>
                    <tr>
                        <td><?php echo $row['FirstName']?></td>
                        <td><?php echo $row['EmailId']?></td>
                        <td><?php echo $row['ContactNumber']?></td>
                        <td><?php echo $row['DOB']?></td>
                        <td><a href="#"><abbr title="Edit"><i class="fa fa-pencil "></i></abbr></a>
                            <a id="trash"href="#"><abbr title="Delete"><i  class="fa fa-trash "></i></abbr></a></td>

                    </tr>    
                    <?php
                }
                    ?>
        </tbody>
    </table>
    <div class="add" style="margin-top: 20px;">
        <a href="insert.php" class="btn btn-info" >ADD New</a>
    </div>
</div>
</body>
</html>