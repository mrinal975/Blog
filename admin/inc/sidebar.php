    <section class="contentsection clear">
        <aside class="leftsidebar clear">
            <div class="samesilebar clear">
                <h2>Theme Option</h2>
                <ul>
                    <li><a href="titleslogan.php">Tittle & Slogan</a> </li>
                    <li><a href="social.php">Social Media</a></li>
                    <li><a href="copyright.php ">Copyright</a></li>
                </ul>
            </div>

            <div class="samesilebar clear">
                <h2>Update Pages</h2>
                <ul>
                    <li><a href="">About Us</a></li> 
                    <li><a href="">Contact Us</a></li> 
                </ul>
            </div>

             <div class="samesilebar clear">
                <h2>Comment Option</h2>
                <ul>
                    <li><a href="comments.php">Show Comments</a></li> 
                </ul>
            </div>

            <div class="samesilebar clear">
                <h2>Page Option</h2>
                <ul>
                    <li><a href="addpage.php">Add New Page</a></li> 

                    <?php       
                                //fetching page from database

                    $query="SELECT * FROM tbl_page";
                    $pages=$db->select($query);
                    if ($pages) {
                         while($result=$pages->fetch_assoc()){
                    ?>
                    <li><a href="page.php?pageid=<?php echo $result['id'];?>"><?php echo $result['name'];?></a></li>
                    
                    <?php  }  } ?>

                </ul>
            </div>

            <div class="samesilebar clear">
                <h2>Category Option</h2>
                <ul>
                    <li><a href="addcat.php">Add Category</a></li>
                    <li><a href="catlist.php">Category List</a></li> 
                </ul>
                <h2>Slider Option</h2>
                <ul>
                    <li><a href="addslider.php">Add Slider</a></li>
                    <li><a href="sliderlist.php">Slider List</a></li> 
                </ul>

            </div>

             <div class="samesilebar clear">
                <h2>Post Option</h2>
                <ul>
                    <li><a href="addpost.php">Add Post</a></li>
                    <li><a href="postlist.php">Post List</a></li> 
                </ul>
            </div>

        </aside>