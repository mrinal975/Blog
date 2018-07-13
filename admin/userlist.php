<?php include'inc/header.php';?>
<?php include'inc/sidebar.php';?>
        <article class="maincontent clear">
            <div class="content">
<?php
            //DELETE User account
    if (isset($_GET['deluser'])) {
        $delid=$_GET['deluser'];
        $delquery="DELETE FROM tbl_user WHERE id='$delid'";
        $deldata=$db->delete($delquery);
        if ($deldata) {
            echo "<span calss='success'>User deleted successfully.</span>";
        }else{
            echo "<span class='error'>User Not deleted !</span>";
        }
    }
?>

                <h2>User List</h2>
               <div class="catoption">
                        <table class="mytable">
                            <tr>
                                <th width="9%">Serial No.</th>
                                <th width="10%"> Name</th>
                                <th width="12%">Username</th>
                                <th width="15%">Emil</th>
                                <th width="23%">Details</th>
                                <th width="7">Roll</th>
                                <th width="14%">Active</th>
                            </tr>

                    <?php
                    $query="SELECT * FROM  tbl_user ORDER BY id desc";
                    $alluser=$db->select($query);
                    if ($alluser) {
                        $i=0;
                    while ($result=$alluser->fetch_assoc()) {
                        $i++;
                    ?>
                        <tr>
                            <td><?php echo $i;?></td>
                            <td><?php echo $result['name'];?></td>
                            <td><?php echo $result['username'];?></td>
                            <td><?php echo $result['email']?></td>
                            <td><?php echo $fm->textShorten($result['details'],20);?></td>
                            <td>

                            <?php
                            if ($result['role']=='1') {
                                echo "Author";
                            }elseif ($result['role']=='0') {
                                echo "Admin";
                            }elseif ($result['role']=='2') {
                                echo "Editor";
                            }?>
                                
                            </td>
                            <td><a href="viewuser.php?userid=<?php echo $result['id'];?>" >View</a>
<?php if(Session::get('userRole')=='0'){ ?>
                                || <a onclick="return confirm('Are you sure to Delete')"; href="?deluser=<?php echo $result['id']; ?>">Delete</a></td>
<?php } ?>
                            
                        </tr>

                            <?php } } ?>
                    </table>
                </div>
            </div>
        </article>
    </section>
	
<?php include 'inc/footer.php';?>
