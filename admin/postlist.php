<?php include'inc/header.php';?>
<?php include'inc/sidebar.php';?>
        <article class="maincontent clear">
            <div class="content">
               <div class="catoption">
                    <h2>Category List</h2>
                        <table class="mytable">
                            <tr>
                                <th width="4%">No.</th>
                                <th width="14%">Post Tittle</th>
                                <th width="21%">Description</th>
                                <th width="8%">Category</th>
                                <th width="15%">Images</th>
                                <th width="8%">Author</th>
                                <th width="9%">Tags</th>
                                <th width="8%">Date</th>
                                <th width="14%">Action</th>
                        </tr>

 <?php
 $query="SELECT tbl_post.* , tbl_category.name FROM tbl_post
        INNER JOIN tbl_category
        ON tbl_post.cat=tbl_category.id
        ORDER BY tbl_post.title DESC";
        $post=$db->select($query);
        if ($post) {
            $i=0;
            while ($result=$post->fetch_assoc()) {
                $i++;
           
 ?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo $result['title'];?></td>
                                <td><?php echo $fm->textShorten($result['body'],50);?></td>
                                <td><?php echo $result['name'];?></td>
                                <td><img src="<?php echo $result['image'];?>" height="45px" width="65px"></td>
                                <td><?php echo $result['author'];?></td>
                                <td><?php echo $result['tags'];?></td>
                                <td><?php echo $fm->formatDate($result['date']);?></td>
                                <td>
                                <a href="viewpost.php?viewpostid=<?php echo $result['id'];?>">View</a>
<?php if (Session::get('userId')== $result['userid'] || Session::get('userRole')=='0') { ?>
                                ||
                                <a href="editpost.php?editid=<?php echo $result['id'];?>">Edit</a>
                                ||
                                <a onclick="return confirm('Are you sure to delete');" href="deletepost.php?delpostid=<?php echo $result['id'];?>">Delete</a>
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