<?php include 'inc/header.php';?>
<?php include'inc/sidebar.php';?>
<?php
if (!Session::get('userRole')=='0') {
    echo "<script>window.location='index.php';</script>";
}
?>
        </aside>
        <article class="maincontent clear">
            <div class="content">
                <h2>Add New User</h2>

<?php
if ($_SERVER['REQUEST_METHOD']=='POST') {
    $username = $fm->validation($_POST['username']);
    $password = $fm->validation(md5($_POST['password']));
    $role     = $fm->validation($_POST['role']);
    $email    = $fm->validation($_POST['email']);


    $username = mysqli_real_escape_string($db->link,$username);
    $password = mysqli_real_escape_string($db->link,$password);
    $role     = mysqli_real_escape_string($db->link,$role);
    $email    = mysqli_real_escape_string($db->link,$email);
    
    if (empty($username) || empty($password) || empty($role) || empty($email)) {
        echo "<span class='error'>Field must not be empty !.</span>";
    }
    else{
        $mailquery="SELECT * FROM tbl_user WHERE email0


        .360
        value\3/--+
        098754HGFS./='$email' LIMIT 1";
        $mailcheck=$db->select($mailquery);

        if ($mailcheck!=false) {
            echo "<span class='error'>Email Already exits</span>";
        }

        else{
            $query="INSERT INTO tbl_user(username,password,email,role) VALUES ('$username','$password',' $email','$role')";
            $catinsert=$db->insert($query);
            if ($catinsert) {
                echo "<span class='success'>User Create Successfully</span>";
            }
            else{
              echo "<span class='error'>User Not Create !</span>";  
            }
        }
}
}
?>
                <form action="" method="post">
                    <table class="form">
                        <tr>
                            <td><label>Username</label></td>
                            <td><input type="text" name="username" placeholder="Please Enter a Username ...."></td>
                        </tr>
                        <tr>
                            <td><label>Password</label></td>
                            <td><input type="Password" name="password" placeholder="Please Enter a Password ...."></td>
                        </tr>
                        <tr>
                            <td><label>Email</label></td>
                            <td><input type="email" name="email" placeholder="Enter a Vaid Email ..."></td>
                        </tr>
                        <tr>
                            <td><label>User Roll</label></td>
                            <td>
                                <select id="select" name="role">
                                    <option>Select User Role</option>
                                    <option value="0">Admin</option>
                                    <option value="1">Author</option>
                                    <option value="2">Editor</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" name="submit" value="Create"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </article>
    </section>
<?php include'inc/footer.php';?>