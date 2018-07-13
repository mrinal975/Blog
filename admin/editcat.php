<?php include 'inc/header.php';?>
<?php include'inc/sidebar.php';?>

<?php
$userid=mysqli_real_escape_string($db->link,$_GET['catid']);
if (!isset($userid) || $userid==NULL) {
   echo "<script>window.location='catlist.php';</script>";
}else{
    $id=$userid;
}
?>
        </aside>
        <article class="maincontent clear">
            <div class="content">
                <h2>Add Category</h2>

<?php
if ($_SERVER['REQUEST_METHOD']=='POST') {
    $name=$_POST['name'];
    $name=mysqli_real_escape_string($db->link,$name);
    if (empty($name)) {
        echo "<span class='error'>Field must not be empty !.</span>";
    }
    else{
        $query="UPDATE tbl_category
        SET 
        name='$name'
        where id='$id'
        ";
        $catinsert=$db->update($query);
        if ($catinsert) {
            echo "<span class='success'>Category Updated Successfully</span>";
            
        }
        else{
          echo "<span class='error'>Category Not Updated Successfully</span>";  
        }
    }
}
?>


<?php
    $query="SELECT * from tbl_category where id='$id' order by id desc";
    $category=$db->select($query);
    while ($result=$category->fetch_assoc()) {
    


?>
                <form action="" method="post">
                    <table class="form">
                        <tr>
                            <td>Add Category  :</td>
                            <td><input type="text" name="name" value="<?php echo $result['name'];?>"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" name="submit" value="Save"></td>
                        </tr>
                    </table>
                </form>
                <?php } ?>
            </div>
        </article>
    </section>
<?php include'inc/footer.php';?>