<?php include'inc/header.php';?>
<?php include'inc/sidebar.php';?>
        <article class="maincontent clear">
            <div class="content">
               <div class="catoption">
                    <h2>Slider List</h2>
                        <table class="mytable">
                            <tr>
                                <th width="7%">No.</th>
                                <th width="25%">Slider Title</th>
                                <th width="55%">Slider Images</th>
                                <th width="13%">Action</th>
                            </tr>

 <?php
        $query="SELECT * FROM tbl_slider";
        $slider=$db->select($query);
        if ($slider) {
            $i=0;
            while ($result=$slider->fetch_assoc()) {
                $i++;
           
 ?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo $result['title'];?></td>
                                <td><img src="<?php echo $result['image'];?>" height="50px" width="70px"></td>
                                <td>
<?php if (Session::get('userRole')=='0') { ?>
                                <a href="editslider.php?slidertid=<?php echo $result['id'];?>">Edit</a>
                                ||
                                <a onclick="return confirm('Are you sure to delete');" href="delslider.php?sliderid=<?php echo $result['id'];?>">Delete</a>
<?php } ?>
                              
                                </td>
                            </tr>
<?php  } }?>
                    </table>
                </div>
            </div>
        </article>
    </section>
	
<?php include 'inc/footer.php';?>