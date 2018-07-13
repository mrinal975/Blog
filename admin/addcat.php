<?php include 'inc/header.php';?>
<?php include'inc/sidebar.php';?>
<?php 
if (!Session::get('userRole')=='2') {
    echo "<script>window.location='index.php';</script>";
}
?>
        </aside>
        <article class="maincontent clear">
            <div class="content">
                <h2>Add Category</h2>
<?php
if ($_SERVER['REQUEST_METHOD']=='POST') {
    $name=$_POST['name'];
    $name=mysqli_real_escape_string($db->link,$name);
    if (empty($name)) {
        echo "<span class='error'>Field must not be empty !.</span>";
    }
    else{
        $query="INSERT INTO tbl_category(name) VALUES ('$name')";
        $catinsert=$db->insert($query);
        if ($catinsert) {
            echo "<span class='success'>Category Inserted Successfully</span>";
        }
        else{
          echo "<span class='error'>Category Not Inserted Successfully</span>";  
        }
    }
}
?>
                <form action="" method="post">
                    <table class="form">
                        <tr>
                            <td>Add Category  :</td>
                            <td><input type="text" name="name" placeholder="Please Enter a Category Name...."></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" name="submit" value="Save"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </article>
    </section>
<?php include'inc/footer.php';?>