<?php include 'inc/header.php'; ?>
<?php
	$pageid=mysqli_real_escape_string($db->link,$_GET['id']);
	if (!isset($pageid) || $pageid==null) {
		header("Location:404.php");
	}
	else{
		$id=$pageid;
	}
?>
	<div class="contentsection contemplate clear">
		<div class="maincontent clear">
			<div class="about ">

				<?php
				$query="SELECT * FROM tbl_post WHERE id=$id";
				$post=$db->select($query);
				if ($post) {
					while ($result=$post->fetch_assoc()) {
						
				?>
				<h2><?php echo $result['title']; ?></h2>
				<h4><?php echo $fm->formatDate($result['date']);?> ,By <a href="#"><?php echo $result['author'];?></a></h4>
				<img src="admin/<?php echo $result['image'];?>">

				<?php echo $result['body'];?>

				<div class="relatedpost clear">
					<h2>Related article</h2>

				<?php 
					    $catid=$result['cat'];
						$queryrelated="SELECT * FROM tbl_post WHERE cat='$catid' ORDER BY rand() LIMIT 6";
						$relatedpost=$db->select($queryrelated);
						if ($relatedpost) {

							while ($result=$relatedpost->fetch_assoc()) {	
					?>
					
					<a href="post.php?id=<?php echo $result['id'];?>">
					<img src="admin/<?php echo $result['image'];?> " alt="post images">
					</a>
					<?php 	} } else{ echo "No Related Post Available !"; } ?>
				</div>
				<?php } }else{ header("Location: 404.php"); }?>
			</div>
		</div>

<?php include'inc/sidebar.php';		?>
<?php include'inc/footer.php';		?>