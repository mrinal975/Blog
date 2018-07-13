<?php include'inc/header.php';?>
<?php include'inc/sidebar.php';?>
        <article class="maincontent clear">
            <div class="content">
                <h2>Category List</h2>

<?php
if (isset($_GET['delcat'])) {
    $delid=$_GET['delcat'];
    $delquery="DELETE from tbl_category where id='$delid'";
    $deldata=$db->delete($delquery);
    if ($deldata) {
       echo "<span class='success'>Category Deleted succfully</span>";
    }else{
        echo  "<span class='success'>Category Not Deleted succfully</span>";
    }
}
?>

               <div class="catoption">
                        <table class="mytable">
                            <tr>
                                <th width="20%">Serial No.</th>
                                <th width="40%">Category Name</th>
                                <th width="40%">Active</th>
                            </tr>

                    <?php
                    $query="SELECT * FROM tbl_category ORDER BY id desc";
                    $category=$db->select($query);
                    if ($category) {
                        $i=0;
                    while ($result=$category->fetch_assoc()) {
                        $i++;
                    ?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo $result['name'];?></td>
                                <td>
<?php if (Session::get('userRole')=='2') {?>

                                <a href="editcat.php?catid=<?php echo $result['id'];?>" >Edit</a>
<?php } ?>
                                
<?php if(Session::get('userRole')=='0') {?>
                                <a onclick="return confirm('Are you sure to Delete')"; href="?delcat=<?php echo $result['id']; ?>">Delete</a></td>
                                <?php }?>
                            </tr>
                            <?php } } ?>
                    </table>
                </div>
            </div>
        </article>
    </section>
	
<?php include 'inc/footer.php';?>
