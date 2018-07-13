<?php include'inc/header.php';?>
<?php include'inc/sidebar.php';?>
        <article class="maincontent clear">
            <div class="content clear">
                <div class="addarticle clear">
                    <h2>Add Article</h2>
<?php
if ($_SERVER['REQUEST_METHOD']=='POST') {

    $title=$fm->validation($_POST['title']);
    $cat=$fm->validation($_POST['cat']);
    $body=$fm->validation($_POST['body']);
    $tags=$fm->validation($_POST['tags']);
    $author=$fm->validation($_POST['author']);
    $userid=$fm->validation($_POST['userid']);

    $title=mysqli_real_escape_string($db->link,$_POST['title']);
    $cat=mysqli_real_escape_string($db->link,$_POST['cat']);
    $body=mysqli_real_escape_string($db->link,$_POST['body']);
    $tags=mysqli_real_escape_string($db->link,$_POST['tags']);
    $author=mysqli_real_escape_string($db->link,$_POST['author']);
     $userid=mysqli_real_escape_string($db->link,$_POST['userid']);

    $permited  = array('jpg', 'jpeg', 'png', 'gif');
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_temp = $_FILES['image']['tmp_name'];

    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
    $uploaded_image = "upload/".$unique_image;

    if ($title=="" || $cat=="" || $body=="" ||  $tags=="" || $author=="" || $file_name=="") {
        echo "<span class='error'> Field must not be empty! </span>";
    }elseif ($file_size >1048567) {
     echo "<span class='error'>Image Size should be less then 1MB!
     </span>";
    } elseif (in_array($file_ext, $permited) === false) {
     echo "<span class='error'>You can upload only:-"
     .implode(', ', $permited)."</span>";
    }
    else{
        move_uploaded_file($file_temp, $uploaded_image);
        $query = "INSERT INTO tbl_post(cat,title,body,image,author,tags,userid) VALUES('$cat','$title','$body','$uploaded_image','$author','$tags','$userid')";
        $inserted_rows = $db->insert($query);
        if ($inserted_rows) {
         echo "<span class='success'>Data Inserted Successfully.
         </span>";
        }else {
         echo "<span class='error'>Data Not Inserted !</span>";
        }
    }
}
?>
                    <form action="addpost.php" method="post" enctype="multipart/form-data">
                        <table>
                            <tr>
                                <td>Tittle </td>
                                <td><input type="text" name="title" placeholder="Please Enter a  Tittle......"></td>
                            </tr>
                            <tr>
                                <td>Catagory </td>
                                <td><select id="select" name="cat">
<?php
$query="SELECT * FROM tbl_category";
$category=$db->select($query);
if ($category) {
    while ($result=$category->fetch_assoc()) {
?>
                                    <option value="<?php echo $result['id'];?>"><?php echo $result['name'];?></option>
<?php     } }    ?>

                                </select></td>
                            </tr>
                            <tr>
                                <td><label>Upload Image</label></td>
                                <td><input type="file" name="image"></td>
                            </tr>
                            <tr>
                                <td><label>Description</label> </td>
                                <td><textarea name="body"></textarea>
                                </td>
                            </tr>
                             <tr>
                                <td><label>Tags</label></td>
                                <td><input type="text" name="tags" placeholder="Enter a  tags......"></td>
                            </tr>
                             <tr>
                                <td><label>Author</label></td>
                                <td>
                                    <input type="text" name="author" value="<?php echo Session::get('UserName');?>">
                                    <input type="hidden" name="userid" value="<?php echo Session::get('userId');?>">
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" name="submit" value="Save"></td>
                            </tr>

                        </table>
                    </form>
                </div>
            </div>
        </article>
    </section>

<?php include 'inc/footer.php';?>