<?php include'inc/header.php';?>
<?php include'inc/sidebar.php';?>
<?php
$slidertid=mysqli_real_escape_string($db->link,$_GET['slidertid']);
if (!isset($slidertid) || $slidertid==NULL) {
   echo "<script>window.location='sliderlist.php';</script>";
}else{
    $sliderid=$slidertid;
}
?>
        <article class="maincontent clear">
            <div class="content clear">
                <div class="addarticle clear">
                    <h2>Edit Slider</h2>
<?php
if ($_SERVER['REQUEST_METHOD']=='POST') {

    $title=mysqli_real_escape_string($db->link,$_POST['title']);

    $permited  = array('jpg', 'jpeg', 'png', 'gif');
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_temp = $_FILES['image']['tmp_name'];

    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
    $uploaded_image = "upload/slider/".$unique_image;

    if ($title=="") {
        echo "<span class='error'> Field must not be empty! </span>";
    }
    else{
    if (!empty($file_name)) {
        if ($file_size >1048567) {
         echo "<span class='error'>Image Size should be less then 1MB!
         </span>";
        } elseif (in_array($file_ext, $permited) === false) {
         echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
        }
        else{
            move_uploaded_file($file_temp, $uploaded_image);
            $query="UPDATE tbl_slider
            SET
            title='$title',,
            image='$uploaded_image'
             WHERE id='$sliderid'";
            $updated_row = $db->update($query);
            if ($updated_row) {
             echo "<span class='success'>Slider Updated Successfully.
             </span>";
            }else {
             echo "<span class='error'>Slider Not Updated !</span>";
            }
        }
    }
    else {
        $query="UPDATE tbl_slider
            SET
            title='$title'
             WHERE id='$sliderid'";
            $updated_row = $db->update($query);
            if ($updated_row) {
             echo "<span class='success'>Slider Updated Successfully.
             </span>";
            }else {
             echo "<span class='error'>Slider Not Updated !</span>";
            }
        }
    }

}
?>

<?php
$query="SELECT * FROM tbl_slider where id='$sliderid'";
$getslider=$db->select($query);
while ($sliderresult=$getslider->fetch_assoc()) {
    
?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <table>
                            <tr>
                                <td>Tittle </td>
                                <td><input type="text" name="title" value="<?php echo $sliderresult['title'];?>"></td>
                            </tr>
                            <tr>
                                <td>Upload New Image</td>
                                <td>
                                    <img src="<?php echo $sliderresult['image']?>" height="100px" width="250px">
                                    <input type="file" name="image">
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" name="submit" value="Update"></td>
                            </tr>

                        </table>
                    </form>
                    <?php } ?>
                </div>
            </div>
        </article>
    </section>

<?php include 'inc/footer.php';?>