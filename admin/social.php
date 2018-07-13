<?php include'inc/header.php';?>
<?php include'inc/sidebar.php';?>
        <article class="maincontent clear">
            <div class="content">
                <h2>Update Social Profile</h2>

<?php 
                    //Update social media
if ($_SERVER['REQUEST_METHOD']=='POST') {
    $fb=$fm->validation($_POST['fb']);
    $tw=$fm->validation($_POST['tw']);
    $ln=$fm->validation($_POST['ln']);
    $gp=$fm->validation($_POST['gp']);

    $fb=mysqli_real_escape_string($db->link,$fb);
    $tw=mysqli_real_escape_string($db->link,$tw);
    $ln=mysqli_real_escape_string($db->link,$ln);
    $gp=mysqli_real_escape_string($db->link,$gp);
    if ($fb=="" || $tw=="" || $ln=="" || $gp=="") {
        echo "<span class='error'>Field must not be empty !!</span>";
    }else{
        $query="UPDATE tbl_social
                SET
                fb='$fb',
                tw='$tw',
                ln='$ln',
                gp='$gp'
                WHERE id='1'";
        $update_row=$db->update($query);
        if ($update_row) {
            echo "<span class='success'>Data Updated Successfully.</span>";
        }
        else{
            echo "<span class='error'>Data Not Updated.</span>";
        }
    }
}

?>

<?php
                //Fetching Data From Database

    $query="SELECT * FROM tbl_social where id='1'";
    $socialmedia=$db->select($query);
    if ($socialmedia) {
        while ($result=$socialmedia->fetch_assoc()) { 
       
?>
                <form action="social.php" method="post">
                    <table>
                        <tr>
                            <td>facebook</td>
                            <td><input type="text" name="fb" value="<?php echo $result['fb'];?>"></td>
                        </tr>
                        <tr>
                            <td>Twitter</td>
                            <td><input type="text" name="tw" value="<?php echo $result['tw'];?>"></td>
                        </tr>
                        <tr>
                            <td>Linked In</td>
                            <td><input type="text" name="ln" value="<?php echo $result['ln'];?>"></td>
                        </tr>
                        <tr>
                            <td>Google Plus</td>
                            <td><input type="text" name="gp" value="<?php echo $result['gp'];?>"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" name="submit" value="submit"></td>
                        </tr>
                    </table>
                </form>

<?php  } }  ?>
            </div>
        </article>
    </section>
	
<?php include 'inc/footer.php';?>