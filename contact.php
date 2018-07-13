<?php include 'inc/header.php'; ?>

<?php
				//Input Validation

	if ($_SERVER['REQUEST_METHOD']=='POST') {
	 	$fname=$fm->validation($_POST['firstname']);
	 	$lname=$fm->validation($_POST['lasttname']);
	 	$email=$fm->validation($_POST['email']);
	 	$body=$fm->validation($_POST['body']);

	 	$fname=mysqli_real_escape_string($db->link,$fname);
	 	$lname=mysqli_real_escape_string($db->link,$lname);
	 	$email=mysqli_real_escape_string($db->link,$email);
	 	$body=mysqli_real_escape_string($db->link,$body);

	 	$errorf="";
	 	$errorl="";
	 	$errore="";
	 	$errorb="";
	 	$msg="";
	 	$error="";

	 	if (empty($fname)) {
	 		$errorf="First name must note be empty !";
	 	}
	 	if (empty($lname)) {
	 		$errorl="Last name must not be empty !";
	 	}
	 	if (empty($email)) {
	 		$errore="Email field must not be empty !";
	 	}
	 	if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
	 		$email="Invalid email address !";
	 	}
	 	if (empty($body)) {
	 		$errorb="Message field must not be empty !";
	 	}
	 	else{
	 		$query="INSERT INTO tbl_contact(firstname,lasttname,email,body) VALUES('$fname','$lname','$email','$body')";
	 		$insert_rows=$db->insert($query);
	 		if ($insert_rows) {
	 			$msg="Message send succfully";
	 		}else{
	 			$error="Message not send";
	 		}
	 	}
	 }	 
?>
<style type="text/css">
	.curseror{
		color: red;
	}
</style>
	<div class="contentsection contemplate clear">
		<div class="maincontent clear">
			<div class="about ">
			<h2>Contact us</h2>
			<form action="" method="post">
				<table>
				<?php 
				if (isset($msg)) {
					echo "<span class='success'>$msg</span>";
					}
					if(isset($error)){
						echo "<span class='error'>$error<span>";
					}
				?>
					<tr>
						<td>Your First Name</td>
						<td><?php if (isset($errorf)) {echo "<span class='curseror'>$errorf</span>";}?>
						<input type="text" name="firstname" placeholder="Enter firstname"></td>
					</tr>
					<tr>
						<td>Your Last Name</td>
						<td><?php if (isset($errorl)) {echo "<span class='curseror'>$errorl</span>";}?>
						<input type="text" name="lasttname" placeholder="Enter lastname"></td>
					</tr>
					<tr>
						<td>Your Email Adress</td>
						<td><?php if (isset($errore)) {echo "<span class='curseror'>$errore</span>";}?>
						<input type="Email" name="email" placeholder="Enter email"></td>
					</tr>
					<tr>
						<td>Your Message</td>
						<td><?php if (isset($errorb)) {echo "<span class='curseror'>$errorb</span>";}?>
						<textarea name="body"></textarea></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" name="submit" value="Send"></td>
					</tr>
				</table>
			</form>
			</div>
		</div>
		
<?php include'inc/sidebar.php';		?>
<?php include'inc/footer.php';		?>