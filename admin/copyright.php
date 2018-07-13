<?php include'inc/header.php';?>
<?php include'inc/sidebar.php';?>
        <article class="maincontent clear">
            <div class="content">
                <h2>Update Copyright</h2>

<?php           //Updating footer 

if ($_SERVER['REQUEST_METHOD']=='POST') {
    $note=$fm->validation($_POST['note']);
    $note=mysqli_real_escape_string($db->link,$note);
    if ($note=="") {
        echo "<span class='error'>Field must not be empty.</span>";
    }else{
        $query="UPDATE tbl_footer
        SET
        note='$note'
        WHERE id='1'";
        $update_row=$db->update($query);
        if ($update_row) {
            echo "<span class='success'>Data updated successfully.</span>";
        }
        else{
            echo "<span class='error'>Data not updated !!</span>";
        }
    }
}
?>


<?php
//Fetching Data From Database
$query="SELECT * FROM tbl_footer WHERE id='1'";
$footernote=$db->select($query);
if ($footernote) {
    while ($result=$footernote->fetch_assoc()) {   
   ?>
                <form action="copyright.php" method="post">
                    <table>
                        <tr>
                            <td>Copyright Text :</td>
                            <td><input type="text" name="note" value="<?php echo $result['note'];?>" placeholder="Copyright text will go there"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" name="Update" value="Update"></td>
                        </tr>
<?php  } } ?>
                    </table>
                </form>
            </div>
        </article>
    </section>
	
<?php include 'inc/footer.php';?>