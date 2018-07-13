<?php include'inc/header.php';?>
<?php include'inc/sidebar.php';?>
        <article class="maincontent clear">
            <div class="content">
               <div class="catoption">
                    <h2> Inbox</h2>
                        <table class="mytable">
                            <tr>
                                <th width="9%">Serial No.</th>
                                <th width="17%">Name</th>
                                <th width="16%">Email</th>
                                <th width="29%">Message</th>
                                <th width="14">Date</th>
                                <th width="20%">Active</th>
                            </tr>

    <?php
                        //sending message to seen box

    if (isset($_GET['seenid'])) {
        $seenid=$_GET['seenid'];
        $query="UPDATE tbl_contact
        SET
        status='1'
        WHERE id='$seenid'";
        $update_row=$db->update($query);
        if ($update_row) {
            echo "<span class='success'>Message send in the seen box</span>";
        }else{
            echo "<span class='error'>Something went wrong !.</span>";
        }
    }
    ?>
    <?php
                        //sending message to Inbox

    if (isset($_GET['unseenid'])) {
        $seenid=$_GET['unseenid'];
        $query="UPDATE tbl_contact
        SET
        status='0'
        WHERE id='$seenid'";
        $update_row=$db->update($query);
        if ($update_row) {
            echo "<span class='success'>Message send in the Inbox</span>";
        }else{
            echo "<span class='error'>Something went wrong !.</span>";
        }
    }
    ?>


    <?php
                            //Fetching data from database

        $query="SELECT * FROM  tbl_contact WHERE status='0' ORDER BY id DESC";
        $msg=$db->select($query);
        if ($msg) {
            $i=0;
            while ($result=$msg->fetch_assoc()) {
                $i++;
    ?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo $result['firstname'].' '.$result['lasttname'];?></td>
                                <td><?php echo $result['email'];?></td>
                                <td><?php echo $fm->textShorten($result['body'],25);?></td>
                                <td><?php echo$fm->formatDate($result['date']);?></td>
                                <td><a href="viewmsg.php?msgid=<?php echo $result['id'];?>">View</a> ||
                                <a href="replymsg.php?msgid=<?php echo $result['id'];?>">Reply</a> ||
                                <a onclick="return confirm('Are sure to move the message !');" href="?seenid=<?php echo $result['id'];?>">Seen</a></td>
                            </tr> 
        <?php } } ?>
                    </table>
                </div>  
            </div>

            <div class="content">
               <div class="catoption">
                    <h2>Seen</h2>
<?php
        //deleting contact information from database
    if (isset($_GET['delid'])) {
        $delid=$_GET['delid'];
        $query="DELETE FROM tbl_contact WHERE id='$delid'";
        $delete_rows=$db->delete($query);
        if ($delete_rows) {
            echo"<span class='success'>Message deleted successfully</span>";
        }else{
            echo"<span class='error'>Message not deleted !</span>";
        }
    }
?>


                       <table class="mytable">
                            <tr>
                                <th width="9%">Serial No.</th>
                                <th width="17%">Name</th>
                                <th width="16%">Email</th>
                                <th width="29%">Message</th>
                                <th width="14">Date</th>
                                <th width="20%">Active</th>
                            </tr>
    <?php
                //fetching seen data from database

        $query="SELECT * FROM  tbl_contact WHERE status='1' ORDER BY id DESC";
        $msg=$db->select($query);
        if ($msg) {
            $i=0;
            while ($result=$msg->fetch_assoc()) {
                $i++;
    ?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo $result['firstname'].' '.$result['lasttname'];?></td>
                                <td><?php echo $result['email'];?></td>
                                <td><?php echo $fm->textShorten($result['body'],25);?></td>
                                <td><?php echo$fm->formatDate($result['date']);?></td>
                                <td>
                                <a href="viewmsg.php?msgid=<?php echo $result['id'];?>">View</a> ||
                                <a onclick="return confirm('Are you sure to unseen the message !');" href="?unseenid=<?php echo $result['id'];?>">Unseen</a> ||
                                <a onclick="return confirm('Are you sure to delete the message !');" href="?delid=<?php echo $result['id'];?>">Delete</a></td>
                            </tr> 
        <?php } } ?>
                    </table>
                </div>
                
            </div>
        </article>
    </section>
<?php include 'inc/footer.php';?>