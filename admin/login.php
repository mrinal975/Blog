<?php include '../lib/Session.php';
Session::checkLogin();
?>
<?php include '../config/config.php';  ?>
<?php include '../lib/Database.php';   ?>
<?php include '../helpers/Format.php'; ?>
<?php
$db=new Database();
$fm=new Format();
?>
<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>User Login</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">        
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
    </head>
<body>

    <section class="loginpage clear">

    <?php
    if ($_SERVER['REQUEST_METHOD']=='POST') {
        $username=$fm->validation($_POST['username']);
        $password=$fm->validation(md5($_POST['password']));

        $username=mysqli_real_escape_string($db->link,$username);
        $password=mysqli_real_escape_string($db->link,$password);
        if (empty($username) || empty($password)) {
          echo "<span class='error';>Enter user name or password</span>";
        }
        else{
        $query="SELECT * FROM tbl_user WHERE username='$username' AND password='$password'";
        $result=$db->select($query);
        if ($result!=false) {
            $value=$result->fetch_assoc();

           Session::set("login",true);
           Session::set("userRole",$value['role']);
           Session::set("UserName",$value['username']);
           Session::set("userId",$value['id']);

           header("Location:index.php");
        }
        else
        {
        echo "<span style='color:red;font-size:18px;'> Username or password not matched !</span>";
    }
    }
    }
    ?>

        <form action="login.php" method="post">
            <h2>User Login</h2>
            <div class="login">
                
                <input type="text" name="username" placeholder="Username">
            </div>
            <div  class="login">
                
                <input type="Password" name="password" placeholder="Password">
            </div>
            <div class="login">
                <input type="submit" name="submit" value="submit">
            </div>
            <div class="classforget">
               <a href="forgetpass.php">Forget password</a>
            </div>
        </form>
    </section>

</body>
</html>
