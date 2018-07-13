<?php      			 //Setting dynamically tittle name

if (isset($_GET['pageid'])) {
	$pagetitleid=$_GET['pageid'];

	$query="SELECT * FROM tbl_page WHERE id='$pagetitleid'";
	$pages=$db->select($query);
	if ($pages) {
		while ($result=$pages->fetch_assoc()) {
			?>

			<title><?php echo $result['name'];?>-<?php echo TITTLE; ?></title>


<?php	} } } 
elseif(isset($_GET['id'])) {
	$postid=$_GET['id'];

	$postid="SELECT * FROM tbl_post WHERE id='$postid'";
	$posts=$db->select($postid);
	if ($posts) {
		while ($result=$posts->fetch_assoc()) {
			?>

			<title><?php echo $result['title'];?>-<?php echo TITTLE; ?></title>


<?php	} } }
	else{ ?>

	<title><?php echo $fm->title();?>-<?php echo TITTLE; ?></title>
<?php } ?>

<meta charset="utf-8">
<meta name="language" content="English">
<meta name="Keywords" content="blog cms blog">
<?php
if (isset($_GET['id'])) {
	$keywordid=$_GET['id'];
	$query="SELECT * FROM tbl_post WHERE id='$keywordid'";
	$keywords=$db->select($query);
	if ($keywords) {
		while ($result=$keywords->fetch_assoc()) {?>
		<meta name="keywords" content="<?php echo $result['tags'];?>">
<?php } } } else{?>
		<meta name="keywords" content="<?php echo KEYWORDS;?>">
<?php	} 
?>