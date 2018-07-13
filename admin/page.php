<?php include'inc/header.php';?>
<?php include'inc/sidebar.php';?>
        <article class="maincontent clear">
            <div class="content clear">
                <div class="addarticle clear">

<?php
            //Getting   page id
$pageid=mysqli_real_escape_string($db->link,$_GET['pageid']);
if (!isset($pageid) || $pageid==NULL) {
    echo "<script>window.location='index.php';</script>";
    }
else{
    $id=$pageid;
}
?>
<style type="text/css">
    .actiondel{
        
        border: 1px solid #222;
        padding: 2px 10px;
        margin: 8px 0px 0px 0px;
        background: #277273 none repeat scroll 0;
        cursor: pointer;
    }
    .actiondel a{
        color: #fff;
        text-decoration: none;
    }
</style>

                    <h2> Edit Page</h2>
<?php
                //Update page 


if ($_SERVER['REQUEST_METHOD']=='POST') {
    $name=$fm->validation($_POST['name']);
    $body=$fm->validation($_POST['body']);

    $name=mysqli_real_escape_string($db->link,$_POST['name']);
    $body=mysqli_real_escape_string($db->link,$_POST['body']);


    if ($name=="" || $body=="") {
        echo "<span class='error'> Field must not be empty! </span>";
    }
    else{
        $query = "UPDATE tbl_page
                  SET
                  name='$name',
                  body='$body'
                  WHERE id='$id'";
        $update_rows = $db->update($query);
        if ($update_rows) {
         echo "<span class='success'>Page Updated Successfully.
         </span>";
        }else {
         echo "<span class='error'>Page Not Updated !</span>";
        }
    }
}
?>


<?php       
                                //fetching page from database

                    $query="SELECT * FROM tbl_page WHERE id='$id'";
                    $pagedeatails=$db->select($query);
                    if ($pagedeatails) {
                         while($result=$pagedeatails->fetch_assoc()){
                    ?>
                    <li><a href="page.php?pageid=<?php echo $result['id'];?>"></a></li>
                    
<?php  ?>

                    <form action="" method="post" enctype="multipart/form-data">
                        <table>
                            <tr>
                                <td>Name</td>
                                <td><input type="text" name="name" value="<?php echo $result['name'];?>"></td>
                            </tr>
                            <tr>
                                <td><label>Content</label> </td>
                                <td><textarea name="body"><?php echo $result['body'];?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" name="save" value="Update">
                                <span class="actiondel"><a onclick="return confirm('Are you sure to delete the page !');" href="deletepage.php?delpage=<?php echo $result['id'];?>">Delete</a></span>
                                </td>
                            </tr>
                        </table>
                    </form>
<?php }  } ?>
                </div>
            </div>
        </article>
    </section>

<?php include 'inc/footer.php';?>