<?php include'inc/header.php';?>
<?php include'inc/sidebar.php';?>

<?php
$msgid=mysqli_real_escape_string($db->link,$_GET['msgid']);
if (!isset($msgid) || $msgid==NULL) {
 echo "<script>window.location='404.php';</script>";
}else{
    $id=$msgid;
}
?>

        <article class="maincontent clear">
            <div class="content clear">
                <div class="addarticle clear">
                    <h2>View Message</h2>
<?php
                //  sending mail

if ($_SERVER['REQUEST_METHOD']=='POST') {
   $to=$fm->validation($_POST['toEmail']);
   $from=$fm->validation($_POST['fromEmail']);
   $subject=$fm->validation($_POST['subject']);
   $message=mysqli_real_escape_string($db->link,$_POST['message']);
   $sendmail=mail($to,$subject,$message,$from);
   if ($sendmail) {
       echo "<span class='success'>Mial send successfully</span>";
   }else{
    echo "<span class='error'>Something went wrong !</span>";
   }
}
?>

<?php 
    $query="SELECT * FROM tbl_contact WHERE id='$id'";
    $msg=$db->select($query);
    if ($msg) {
        while ($result=$msg->fetch_assoc()) {
?>
                    <form action="post" method="post" enctype="multipart/form-data">
                        <table>
                            <tr>
                                <td>To</td>
                                <td><input readonly type="text" name="toEmail" value="<?php echo $result['email'];?>"></td>
                            </tr>
                            <tr>
                                <td>From</td>
                                <td><input type="text" name="fromEmail" placeholder="Please Enter Your Email Address"></td>
                            </tr>
                            <tr>
                                <td>Subject</td>
                                <td><input type="text" name="subject" placeholder="Please Enter Your Subject"></td>
                            </tr>
                             <tr>
                                <td><label>Message</label> </td>
                                <td><textarea name="message"></textarea>
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