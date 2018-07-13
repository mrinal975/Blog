<?php include'inc/header.php';?>
<?php include'inc/sidebar.php';?>
<?php
$userid = Session::get('userId');
$role   = Session::get('userRole');
$name   = Session::get('UserName');
?>
        <article class="maincontent clear">
            <div class="content clear">
                <div class="addarticle clear">
                    <h2>Profile</h2>
<?php
                //updating data 
    if ($_SERVER['REQUEST_METHOD']=='POST') {
        $name=mysqli_real_escape_string($db->link,$_POST['name']);
        $username=mysqli_real_escape_string($db->link,$_POST['username']);
        $email=mysqli_real_escape_string($db->link,$_POST['email']);
        $details=mysqli_real_escape_string($db->link,$_POST['details']);

        $query="UPDATE tbl_user
                SET
                name='$name',
                username='$username',
                email='$email',
                details='$details'
                WHERE id='$userid'";
        $update_row=$db->update($query);
        if ($update_row) {
            echo "<span class='success'>Data Update Successfully.</span>";
        }else{
            echo "<span class='error'>Data not Updated !</span>";
        }
    }
?>


<?php
                 //fetching data from database
$query="SELECT * FROM tbl_user where id='$userid' AND role='$role'";
$getuser=$db->select($query);
if ($getuser) {

while ($result=$getuser->fetch_assoc()) {?>

                    <form action="" method="post" enctype="multipart/form-data">
                        <table>
                            <tr>
                                <td>Name </td>
                                <td><input type="text" name="name" value="<?php echo $result['name'];?>"></td>
                            </tr>
                            <tr>
                                <td><label>Username</label></td>
                                <td><input type="text" name="username" value="<?php echo $result['username'];?>"></td>
                            </tr>
                             <tr>
                                <td><label>E-mail</label></td>
                                <td><input type="text" name="email" value="<?php echo $result['email'];?>"></td>
                            </tr>
                            <tr>
                                <td>Details</td>
                                <td><textarea name="details">
                                <?php echo $result['details'];?>
                                    
                                </textarea></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" name="submit" value="Update"></td>
                            </tr>

                        </table>
                    </form>


<?php } }?>              
                </div>
            </div>
        </article>
    </section>

<?php include 'inc/footer.php';?>