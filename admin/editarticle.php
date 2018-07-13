<?php include'inc/header.php';?>
<?php include'inc/sidebar.php';?>
        <article class="maincontent clear">
            <div class="content">
                <h2>Add Category</h2>
                <form action="" method="">
                    <table>
                        <tr>
                            <td>Add Category  :</td>
                            <td><input type="text" name="copyright" value="Please Enter a Category Name"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" name="submit" value="Add"></td>
                        </tr>
                    </table>
                </form>


               <div class="catoption">
                    <h2>Category List</h2>
                        <table class="mytable">
                            <tr>
                                <th width="10%">No.</th>
                                <th width="15%">Tittle Name</th>
                                <th width="30%">Description</th>
                                <th width="10%">Category</th>
                                <th width="10%">Tags</th>
                                <th width="15%">Images</th>
                                <th width="10%">Action</th>
                            </tr>

                            <tr>
                                <td>01</td>
                                <td>Article Tittle</td>
                                <td>Article Description</td>
                                <td>Health</td>
                                <td>Physical health</td>
                                <td><img src="" alt="image"></td>
                                <td><a href="">Edit</a> || <a href="">Delete</a></td>
                            </tr>
                             <tr>
                               <td>05</td>
                                <td>Article Tittle</td>
                                <td>Article Description</td>
                                <td>Health</td>
                                <td>Physical health</td>
                                <td><img src="" alt="image"></td>
                                <td><a href="">Edit</a> || <a href="">Delete</a></td>
                            </tr>

                    </table>
                </div>
            </div>
        </article>
    </section>
	
<?php include 'inc/footer.php';?>