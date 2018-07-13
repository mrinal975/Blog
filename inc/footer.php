</div>
<div class="footersection template clear">
	<div class="footermenu clear">
		<ul>
		<li><a href="index.php">Home</a></li>
		<li><a href="about.php">About</a></li>
		<li><a href="contact.php">Contact</a></li>
		</ul>
	</div>
<?php 		//Updating footer dynamically

$query="SELECT * FROM tbl_footer WHERE id='1'";
$footernote=$db->select($query);
if ($footernote) {
	while ($result=$footernote->fetch_assoc()) {
	
?>

	<p>&copy; <?php echo $result['note'];?> <?php echo date('Y');?></p>
<?php } }?>
</div>
<div class="fixedicon clear">

<?php 			//Updating social media dynamically

$query="SELECT * FROM tbl_social WHERE id='1'";
$socialmedia=$db->select($query);
if ($socialmedia) {
	while ($result=$socialmedia->fetch_assoc()) {
	 ?>
	<a href="<?php echo$result['fb'];?>" target="_blank"><img src="images/fb.png" alt="Facebook"></a>
	<a href="<?php echo $result['tw'];?>" target="_blank"><img src="images/tw.png" alt="Twitter"></a>
	<a href="<?php echo$result['ln'];?>" target="_blank"><img src="images/in.png" alt="LinkedIn"></a>
	<a href="<?php echo $result['gp'];?>" target="_blank"><img src="images/gl.png" alt="Goole"></a>
</div>
<?php }	}	?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-68821101-1', 'auto');
  ga('send', 'pageview');
</script>

<script type="text/javascript" src="js/scroll.js"></script>

</body>
</html>