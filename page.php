<?php include 'inc/header.php'; ?>
<?php
			//gettign page id
$pageid=mysqli_real_escape_string($db->link,$_GET['pageid']);
if (!isset($pageid) || $pageid==NULL) {
	echo "<script>window.location='404.php';</script>";
}else{
	$id=$pageid;
}
?>


<?php
			///fetching page details from  database 

$pagequery="SELECT * FROM tbl_page WHERE id='$id'";
$pagedetails=$db->select($pagequery);
if ($pagedetails) {
	while ($result=$pagedetails->fetch_assoc()) {

?>
	<div class="contentsection contemplate clear">
		<div class="maincontent clear">
			<div class="about ">
				<h2><?php echo $result['name'];?></h2>
				<?php echo $result['body'];?>
			</div>
		</div>	
<?php 	}  }
else{
	header("Location:404.php");	}
?>
<?php include'inc/sidebar.php';		?>
<?php include'inc/footer.php';		?>