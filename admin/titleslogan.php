<?php include'inc/header.php';?>
<?php include'inc/sidebar.php';?>
<style >
    .leftside{
        float: left;width: 70%;
    }
    .rightside{
        float: left;width: 20%;
    }
    .rightside img{
        height: 160px;width: 170px;
    }
</style>
    <?php
    $query="SELECT * FROM title_slogan where id='1'";
    $blog_title=$db->select($query);
    if ($blog_title) {
        while ($result=$blog_title->fetch_assoc()) {
    ?>
        <article class="maincontent clear">
            <div class="content">
                <h2>Update Site Title and Description</h2>
                <div class="leftside">
<?php
if ($_SERVER['REQUEST_METHOD']=='POST') {

    $title=$fm->validation($_POST['title']);
    $slogan=$fm->validation($_POST['slogan']);
    $title=mysqli_real_escape_string($db->link,$title);
    $slogan=mysqli_real_escape_string($db->link,$slogan);

    $permited  = array('png');
    $file_name = $_FILES['logo']['name'];
    $file_size = $_FILES['logo']['size'];
    $file_temp = $_FILES['logo']['tmp_name'];

    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $same_image = 'logo'.'.'.$file_ext;
    $uploaded_image = "upload/".$same_image;

    if ($title=="" || $slogan=="") {
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
            $query="UPDATE title_slogan
            SET
            title='$title',
            slogan='$slogan',
            logo='$uploaded_image'
            WHERE id='1'";
            $updated_row = $db->update($query);
            if ($updated_row) {
             echo "<span class='success'>Data Updated Successfully.
             </span>";
            }else {
             echo "<span class='error'>Data Not Updated !</span>";
            }
        }
    } else {
        $query="UPDATE title_slogan
            SET
            title='$title',
            slogan='$slogan'
             WHERE id='1'";
            $updated_row = $db->update($query);
            if ($updated_row) {
             echo "<span class='success'>Data Updated Successfully.
             </span>";
            }else {
             echo "<span class='error'>Data Not Updated !</span>";
            }
        }
    }
}
?>
                <form action="" method="post" enctype="multipart/form-data">
                    <table>
                        <tr>
                            <td>Website Tittle :</td>
                            <td><input type="text" name="title" value="<?php echo $result['title'];?>"></td>
                        </tr>
                        <tr>
                            <td> Website Slogan :</td>
                            <td><input type="text" name="slogan" value="<?php echo $result['slogan'];?>"></td>
                        </tr>
                        <tr>
                                <td><label>Upload Logo</label></td>
                                <td><input type="file" name="logo"></td>
                            </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" name="submit" value="Update"></td>
                        </tr>

                    </table>
                </form>
                </div>
               
                <div class="rightside">
                    <img src="<?php echo $result['logo'];?>" alt="logo">
                </div>
    <?php    } }  ?>
            </div>
        </article>
    </section>
<?php include 'inc/footer.php';?>