<?php include'inc/header.php';?>
<?php include'inc/sidebar.php';?>

<?php
$msgid=mysqli_real_escape_string($db->link,$_GET['msgid']);
if (!isset($msgid) || $msgid==NULL) {
    echo "<script>window.location='inbox.php';</script>";
}else{
    $id=$msgid;
}
?>

        <article class="maincontent clear">
            <div class="content clear">
                <div class="addarticle clear">
                    <h2>View Message</h2>
<?php
                //  Creating page and saving record into database

if ($_SERVER['REQUEST_METHOD']=='POST') {
    echo "<script>window.location='inbox.php';</script>";
}
?>

<?php 
    $query="SELECT * FROM tbl_contact WHERE id='$id'";
    $msg=$db->select($query);
    if ($msg) {
        $i=0;
        while ($result=$msg->fetch_assoc()) {
            $i++;
?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <table>
                            <tr>
                                <td>Name</td>
                                <td><input type="text" value="<?php echo $result['firstname'].' '.$result['lasttname'];?>"></td>
                            </tr>
                            <tr>
                                <td>E-mail</td>
                                <td><input type="text" value="<?php echo $result['email'];?>"></td>
                            </tr>
                            <tr>
                                <td>Date</td>
                                <td><input type="text" value="<?php echo $fm->formatDate($result['date']);?>"></td>
                            </tr>
                             <tr>
                                <td><label>Message</label> </td>
                                <td><textarea><?php echo $result['body']; ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit"  value="OK"></td>
                            </tr>
                        </table>
                    </form>
<?php   } }  ?>
                </div>
            </div>
        </article>
    </section>

<?php include 'inc/footer.php';?>