<!DOCTYPE html>
<html>
<?php
require('head.php');
require('function.php')
?>
<body>
    <div class="container">
        <div class="phb">
        <i class="fa fa-book "></i>
        MY PHONE BOOK
        </div>
    <table id="example" class="display table-responsive" style="width:100%">
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
                        <td><a href="update.php?uid=<?php echo $row['id'] ?>"><abbr title="Edit" class="btn btn-success"><i class="fa fa-pencil "></i></abbr></a>
                            <a id="trash" class="btn btn-danger" href="index.php?del=<?php echo $row['id'] ?>" onclick="return confirm('delete contact')"><abbr title="Delete"><i  class="fa fa-trash "></i></abbr></a></td>

                    </tr>    
                    <?php
                }
                    ?>
        </tbody>
    </table>
    <div class="add" style="margin-top: 20px;">
        <a href="insert.php" class="btn" id="plus"  ><i class="fa fa-plus"></i></a>
    </div>
</div>
</body>
</html>
<?php  
    if(isset($_GET['del']))
    {
        $rid=$_GET['del'];
        $deld=new DB_con();
        $del1=$deld->delete($rid);
        if($del1)
        {

         echo "<script>alert('contact deleted');</script>";
        }
        else
        {
            echo "<script>alert('not deleted');</script>";
        }
    }


?>





