<?php include 'config/config.php';	?>
<?php include 'lib/Database.php';	?>
<?php

$db=new Database();
$per_page=3;
$total=ceil(4/$per_page);
echo "number of page";

$page=$total;
echo $page;

$per_page=3;
echo "</br>";
$start_form=($page-1)*$per_page;
echo $start_form;
echo "</br>";
$query="SELECT * FROM tbl_post LIMIT $start_form";
		$post=$db->select($query);
		if ($post) {
			while ($result=$post->fetch_assoc()){
				echo $result['id'];
			}
		}

?>