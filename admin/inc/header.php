<?php
include '../lib/Session.php';
Session::checkSession();
?>
<?php include '../config/config.php';  ?>
<?php include '../lib/Database.php';   ?>
<?php include '../helpers/Format.php'; ?>
<?php
$db=new Database();
$fm=new Format();
?>
<?php
  //set headers to NOT cache a page
  header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
  header("Pragma: no-cache"); //HTTP 1.0
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  // Date in the past
  //or, if you DO want a file to cache, use:
  header("Cache-Control: max-age=2592000"); 
//30days (60sec * 60min * 24hours * 30days)
?>
<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Admin Panel</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
       
       <script src="tinymce/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
    </head>
<body>
<div class="template clear ">
    <div class="title clear">
    <?php
    if (isset($_GET['action'])&& $_GET['action']=="logout") {
       Session::destroy();
    }
    ?>
        <h2>Traning With Live Project</h2>
        <div class="navbar"> 
          <ul>
              <li><a href="">Hi,
                <?php
                $name=Session::get('UserName');
                echo $name;
                ?>
              </a></li>
              <li><a href="?action=logout">Logout</a></li>
          </ul>
        </div>
    </div>
    <header class="headeroption clear">
        <nav class="mainmenu clear">
            <ul>
                <li><a href="index.php">Dashmord</a></li>
                <li><a href="theme.php">Theme</a></li>
                <li><a href="profile.php">User Profile</a></li>
                <li><a href="inbox.php">Inbox

                <?php
                        //showing got message number
                $query="SELECT * FROM tbl_contact WHERE status='0' ORDER BY id DESC";
                $msg=$db->select($query);
                if ($msg) {
                  $count=mysqli_num_rows($msg);
                  echo "(".$count.")";
                }
                else{
                  echo "(0)";
                }
                ?>
                </a></li>
                <li><a href="changepass.php">Change Password</a></li>
                
<?php
if (Session::get('userRole')=='0') { ?>
                  <li><a href="adduser.php">Add User</a></li>
<?php } ?>
                <li><a href="userlist.php">User List</a></li>
            </ul>
        </nav>
    </header>
