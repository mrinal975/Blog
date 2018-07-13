<?php include 'config/config.php';	?>
<?php include 'lib/Database.php';	?>
<?php include 'helpers/Format.php'; ?>
<?php
$db=new Database();
$fm=new Format();
?>
<!DOCTYPE html>
<html>
<head>

<?php //including Tittle And Meta 
include 'scripts/meta.php'; ?>
<?php //Includeing css file
include 'scripts/css.php'; ?>
<?php //Includeing javascript file
include 'scripts/js.php'; ?>


</head>
<body>
	<div class="headersection template clear">
	<a href="index.php">
		<div class="logo">

		<?php   	
				//Title solgan dynamically update

		$query="SELECT * FROM title_slogan WHERE id='1'";
		$blog_title=$db->select($query);

if ($blog_title) {
	while ($result=$blog_title->fetch_assoc()) {
?>
			<img src="admin/<?php echo $result['logo'];?>" alt="logo">
			<h2><?php echo $result['title'];?></h2>
			<p><?php echo $result['slogan'];?></p>
<?php } } ?>
		</div>
	</a>
	<div class="social clear">

<?php 			
			//Upodating social media dynamically

$query="SELECT * FROM tbl_social WHERE id='1'";
$socialmedia=$db->select($query);
if ($socialmedia) {
	while ($result=$socialmedia->fetch_assoc()) {
		
	
?>
		<a href="<?php echo $result['fb'];?>"><i class="fa fa-facebook-square"></i></a>
		<a href="<?php echo $result['tw'];?>"><i class="fa fa-twitter-square"></i></a>
		<a href="<?php echo $result['ln'];?>"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
		<a href="<?php echo $result['gp'];?>"><i class="fa fa-google-plus-official" aria-hidden="true"></i></a>
<?php } }?>
	</div>
	<div class="search clear">
		<form action="search.php" method="get">
			<input type="text" name="search" placeholder="Search Keyword....">
			<input type="submit" name="submit" value="search">
		</form>
	</div>
	</div>
	<div class="navsection template">

	<?php   			 //highlight menubar dynamically

	$path=$_SERVER['SCRIPT_FILENAME'];
	$currentpage=basename($path,'.php');
	?>

		<ul>
			<li><a <?php if ($currentpage=='index') { echo 'id="active"'; } ?>  href="index.php">Home</a></li>

			<?php 
				$query="SELECT * FROM tbl_page";
				$page=$db->select($query);
				if ($page) {
					while ($result=$page->fetch_assoc()) { ?>
			<li><a 
				<?php if (isset($_GET['pageid']) && $_GET['pageid']==$result['id']) {echo 'id="active"'; } ?>

			href="page.php?pageid=<?php echo $result['id']; ?>"><?php echo $result['name'];?></a></li>
			<?php } } ?>
			<li><a <?php if ($currentpage=='contact') {echo 'id="active"';}?> href="contact.php">Contact</a>
			</li>
		</ul>
	</div>