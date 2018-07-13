<?php include'inc/header.php';?>
<?php include'inc/sidebar.php';?>
<?php
$userid=Session::get('userId');
$roll=Session::get('Roll');
?>
        <article class="maincontent clear">
            <div class="content clear">
                <div class="addarticle clear">
<?php
$userid=mysqli_real_escape_string($db->link,$_GET['userid']);
if (!isset($userid)|| $userid==NULL) {
    echo "<script>window.location='userlist.php'</script>";
}
else{
    $id=$userid;
}
?>
                        <h2>Profile</h2>
<?php
if ($_SERVER['REQUEST_METHOD']=='POST') {
    echo "<script>window.location='userlist.php';</script>";
}
?>



<?php
                 //fetching data from database
$query="SELECT * FROM tbl_user where id='$userid' AND role='$roll'";
$getuser=$db->select($query);
if ($getuser) {

while ($result=$getuser->fetch_assoc()) {?>

                    <form action="" method="post" enctype="multipart/form-data">
                        <table>
                            <tr>
                                <td>Name </td>
                                <td><input type="text" readonly value="<?php echo $result['name'];?>"></td>
                            </tr>
                            <tr>
                                <td><label>Username</label></td>
                                <td><input type="text" readonly value="<?php echo $result['username'];?>"></td>
                            </tr>
                             <tr>
                                <td><label>E-mail</label></td>
                                <td><input type="text" readonly value="<?php echo $result['email'];?>"></td>
                            </tr>
                            <tr>
                                <td>Details</td>
                                <td><textarea name="details">
                                <?php echo $result['details'];?>
                                    
                                </textarea></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" readonly value="Update"></td>
                            </tr>

                        </table>
                    </form>


<?php } }?>
                </div>
            </div>
        </article>
    </section>

<?php include 'inc/footer.php';?>