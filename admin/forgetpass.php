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
        $email=$fm->validation(md5($_POST['email']));
        $email=mysqli_real_escape_string($db->link,$email);
        if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            echo"Invalid Email Address !";
        }else{
            $mailquery="SELECT * FROM tbl_user WHERE email='$email' LIMIT 1";
            $mailckeck=$db->select($mailquery);
            if ($mailckeck!=false) {
               while($value=$mailckeck->fetch_assoc()){;

               $userid=$value['id'];
               $username=$value['username'];
                }
                $text     = substr($email, 0,3);
                $rand     = rand(10000,99999);
                $newpass  = "$text$rand";
                $password = md5($newpass);
                
                $updatequery="UPDATE tbl_user
                              SET
                              password='$password'
                              WHERE id='$userid'";
                $updaterow=$db->update($updatequery);

                $to      = $email;
                $from    = "mrinalmallik1@gmail.com";
                $headers = "From:$from \n";
                $headers = "MIME-Version: 1.0\r\n";
                $headers = "Content-type: text/html; charset=iso-8859-1\r\n";
                $subject = "Your new password";
                $message = "Your Username is".$username."and password is".$newpass." Please visite website for login";

                $sendmail=mail($to, $subject, $message,$headers);
                if ($sendmail) {
                    echo "<span style='color:green;font-size:18px;'> Please check your mail for new password !</span>";
                }else{
                    echo "<span style='color:red;font-size:18px;'> Email not send !</span>";
                }
            }
            else
            {
            echo "<span style='color:red;font-size:18px;'> Email not exist!</span>";
        }
    }
}
    ?>

        <form action="" method="post">
            <h2>Password Recovery</h2>
            <div  class="login">   
                <input type="email" name="email" placeholder="Please Enter Password">
            </div>
            <div class="login">
                <input type="submit" name="submit" value="Send Mail !">
            </div>
        </form>
        <div class="button">
            <a href="forgetpass.php">Login !</a>
        </div>
    </section>

</body>
</html>
