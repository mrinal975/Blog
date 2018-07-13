 <?php include'inc/header.php';?>
<?php include'inc/sidebar.php';?>
        <article class="maincontent clear">
            <div class="content clear">
                <div class="addarticle clear">
                    <h2>Add New Page</h2>
<?php  //Only editor can view this page
if (!Session::get('userRole')=='2') {
    echo "<script>window.location='index.php';</script>";
}
?>

<?php
                //  Creating page and saving record into database

if ($_SERVER['REQUEST_METHOD']=='POST') {
    $name=$fm->validation($_POST['name']);
    $body=$fm->validation($_POST['body']);

    $name=mysqli_real_escape_string($db->link,$_POST['name']);
    $body=mysqli_real_escape_string($db->link,$_POST['body']);


    if ($name=="" || $body=="") {
        echo "<span class='error'> Field must not be empty! </span>";
    }
    else{
        $query = "INSERT INTO  tbl_page(name,body) VALUES('$name','$body')";
        $inserted_rows = $db->insert($query);
        if ($inserted_rows) {
         echo "<span class='success'>Page Created Successfully.
         </span>";
        }else {
         echo "<span class='error'>Page Not Created !</span>";
        }
    }
}
?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <table>
                            <tr>
                                <td>Name</td>
                                <td><input type="text" name="name" placeholder="Please Enter a  Name......"></td>
                            </tr>
                            <tr>
                                <td><label>Content</label> </td>
                                <td><textarea name="body"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" name="save" value="Create"></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </article>
    </section>

<?php include 'inc/footer.php';?>