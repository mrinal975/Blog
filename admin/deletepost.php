<?php
include '../lib/Session.php';
Session::checkSession();
?>
<?php include '../config/config.php';  ?>
<?php include '../lib/Database.php';   ?>
<?php include '../helpers/Format.php'; ?>
<?php
$db=new Database();
?>
<?php
$delpostid=mysqli_real_escape_string($db->link,$_GET['delpostid']);
if (!isset($delpostid) || $delpostid==NULL) {
   echo "<script>window.location='postlist.php';</script>";
}else{
    $postid=$delpostid;
    $query="SELECT * FROM tbl_post WHERE id='$postid'";
    $getData=$db->insert($query);
    if ($getData) {
    	while ($delimg=$getData->fetch_assoc()) {
    		$dellink=$delimg['image'];
    		unlink($dellink);
    	}
    }
    $delquery="DELETE from tbl_post WHERE id='$postid'";
    $delData=$db->delete($delquery);
    if($delData){
    	echo "<script>alert('Data Deleted Successfully.');</script>";
    	echo "<script>window.location='postlist.php';</script>";
    }
    else{
    	echo "<script>alert('Data Not Deleted.');</script>";
    	echo "<script>window.location='postlist.php';</script>";
    } 
}
?>