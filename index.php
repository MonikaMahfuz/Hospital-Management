<?php
   session_start();
if(isset($_SESSION['user'])!="")
{
 header("Location: home.php");
}
include_once 'dbconnect.php';

if(isset($_POST['btn-login']))
{
 $email = mysql_real_escape_string($_POST['email']);
 $upass = md5(mysql_real_escape_string($_POST['password']));
 $res=mysql_query("SELECT * FROM user WHERE email='$email'");
 while ($row=mysql_fetch_array($res)) {

   if($row['password']==$upass)
   {
    $_SESSION['user'] = $row['user'];
    header("Location: home.php");
   }
   else
   {
    ?>
          <script>alert('wrong details');</script>
          <?php
   }
 }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Hospital Management | Login Page</title>

</head>

<body>
    <section>
            <div align="center">
                <form method="post" >
                    <h3 >Sign In</h3>

                        <div >
                            <input type="text" name="email" required="" placeholder="Email">
                        </div>

                        <div >
                            <input class="form-control" type="password" name="password" required="" placeholder="Password">
                        </div>

                        <div >
                            <button name="btn-login" type="submit">Sign in</button>
                        </div>
                </form>
            </div>
    </section>
</body>
</html>