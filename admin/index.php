<?php include'inc/header.php';?>
<?php include'inc/sidebar.php';?>
<?php
$name=Session::get('UserName');
?>
        <article class="maincontent clear">
                <div class="content">
                   <h1>HI <?php echo $name;?>, This is Home Page.</h1>
                </div>
        </article>
    </section>
<?php include 'inc/footer.php';?>
