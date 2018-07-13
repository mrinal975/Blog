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
$sliderid=mysqli_real_escape_string($db->link,$_GET['sliderid']);
if (!isset($sliderid) || $sliderid==NULL) {
   echo "<script>window.location='slidertlist.php';</script>";
}else{
    $sliderid=$sliderid;
    $query="SELECT * FROM tbl_slider WHERE id='$sliderid'";
    $getData=$db->insert($query);
    if ($getData) {
    	while ($delimg=$getData->fetch_assoc()) {
    		$dellink=$delimg['image'];
    		unlink($dellink);
    	}
    }
    $delquery="DELETE from tbl_slider WHERE id='$sliderid'";
    $delData=$db->delete($delquery);
    if($delData){
    	echo "<script>alert('Slider Deleted Successfully.');</script>";
    	echo "<script>window.location='sliderlist.php';</script>";
    }
    else{
    	echo "<script>alert('Slider Not Deleted.');</script>";
    	echo "<script>window.location='sliderlist.php';</script>";
    } 
}
?>