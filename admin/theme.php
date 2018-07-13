<?php include 'inc/header.php';?>
<?php include'inc/sidebar.php';?>
        </aside>
        <article class="maincontent clear">
            <div class="content">
                <h2>Themes</h2>

<?php
if ($_SERVER['REQUEST_METHOD']=='POST') {
    $theme=$_POST['theme'];
    $theme=mysqli_real_escape_string($db->link,$theme);
    
    $query="UPDATE tbl_theme
    SET 
    theme='$theme'
    where id='1'";
    $update_row=$db->update($query);
    if ($update_row) {
        echo "<span class='success'>Theme Updated Successfully</span>";
        
    }
    else{
      echo "<span class='error'>Theme Not Updated Successfully</span>";  
    }
} 
?>


<?php 
    $query="SELECT * from tbl_theme where id='1'";
    $themes=$db->select($query);
    while ($result=$themes->fetch_assoc()) {  
?>
            <div class="themechange clear">
                <form action="" method="post">
                    <table class="form">
                        <tr><td><input <?php if ($result['theme']=='default') {echo "checked";}?> type="radio" name="theme" value="default">Default</td></tr>
                        <tr><td><input <?php if ($result['theme']=='green'){echo "checked";}?> type="radio" name="theme" value="green">Green</td></tr>
                        <tr><td><input <?php if ($result['theme']=='red') {echo "checked";}?> type="radio" name="theme" value="red">Red</td></tr>
                        <tr>
                            <td><input type="submit" name="submit" value="Change"></td>
                        </tr>
                    </table>
                </form>
            </div>
                <?php  } ?>
            </div>
        </article>
    </section>
<?php include'inc/footer.php';?>