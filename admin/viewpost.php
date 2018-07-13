<?php include'inc/header.php';?>
<?php include'inc/sidebar.php';?>
<?php
$viewpostid=mysqli_real_escape_string($db->link,$_GET['viewpostid']);
if (!isset($viewpostid)|| $viewpostid==NULL) {
    echo "<script>window.location='postlist.php';</script>";
}
else{
    $postid=$viewpostid;
}
?>


<?php
if ($_SERVER['REQUEST_METHOD']=='POST') {

}
?>


<?php
                    //fetching data from database

$query="SELECT * FROM tbl_post where id='$postid' order by id desc";
$getpost=$db->select($query);
while ($postresult=$getpost->fetch_assoc()) {
    
?>
                <div class="viewpost">
                    <form action="" method="post" enctype="multipart/form-data">
                        <table>
                            <tr>
                                <td>Tittle </td>
                                <td><input type="text" readonly value="<?php echo $postresult['title'];?>"></td>
                            </tr>
                            <tr>
                                <td>Catagory </td>
                                <td><select id="select" readonly>
<?php
$query="SELECT * FROM tbl_category";
$category=$db->select($query);
if ($category) {
    while ($result=$category->fetch_assoc()) {
?>
                                    <option
                                    <?php
                                    if ($postresult['cat']==$result['id']) { ?>
                                    selected="selected"
                                    <?php } ?>
                                    value="<?php echo $result['id'];?>"><?php echo $result['name'];?></option>
<?php     } }    ?>

                                </select></td>
                            </tr>
                            <tr>
                                <td>Image</td>
                                <td>
                                    <img src="<?php echo $postresult['image']?>" height="110px" width="250px">
                                </td>
                            </tr>
                            <tr>
                                <td>Description </td>
                                <td><textarea class="tinymce" readonly >
                                    <?php echo $postresult['body']; ?>
                                </textarea>
                                </td>
                            </tr>
                             <tr>
                                <td>Tags</td>
                                <td><input type="text" readonly value="<?php echo $postresult['tags'];?>"></td>
                            </tr>
                             <tr>
                                <td>Author</td>
                                <td>
                                <input type="text" readonly value="<?php echo $postresult['author'];?>">
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" name="submit" value="OK"></td>
                            </tr>

                        </table>
                        <?php } ?>
                    </form>
                </div>
                </div>
            </div>
        </article>
    </section>

<?php include 'inc/footer.php';?>