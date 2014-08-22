<?php
session_start();
?>
<html>
<?php
$ADMIN_USER_NAME = 'admin';
$ADMIN_PASSWORD = 'admin';
////////////////////////////

$error_msg = "";
if (!isset($_SESSION['admin_user'])) {
    if (isset($_POST['submit'])) {
        $user_username = $_POST['user_name'];
        $user_password = $_POST['password'];
        if ($user_username == $ADMIN_USER_NAME && $user_password == $ADMIN_PASSWORD && isset($user_username)) {
            $_SESSION['admin_user'] = 'admin';
            setcookie('admin_user', 'admin', time() + (60 * 60 * 24 * 30));
            $go_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . 'admin.php';
            header('Location: ' . $go_url);
        }
        else {
            // The username/password are incorrect so set an error message
            $error_msg = 'نام کاربری و رمز عبور وارد شده صحیح نیستند.لطفا دوباره امتحان نمایید.';
            $go_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF'] . 'admin_login.php');
            header('Location: ' . $go_url);

        }
    }
}
else {
    $go_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/admin.php';
    header('Location: ' . $go_url);
}
?>
<!DOCTYPE html>

<head>

    <!--- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <title>admin login page</title>
    <meta name="ورود مدیریت سایت" content="">
    <meta name="author" content="">

    <!-- Mobile Specific Metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <!-- Favicons
     ================================================== -->
    <link rel="shortcut icon" href="favicon.png" >
    <link rel="stylesheet" href="css/admin.css">

</head>

<body>
<form class="admin_login" method="post" id="contactForm" name="loginform">
    <fieldset>

        <div>
            <label for="user_name">User name:</label><br>
            <input type="text" value="" size="20" id="user_name" name="user_name">
        </div>

        <div>
            <label for="password">Password:</label><br>
            <input type="password" value="" size="20" id="password" name="password">
        </div>
        <div>
            <button class="submit" name="submit" value="submit" type="submit">Log me in</button>
        </div>

    </fieldset>
</form> <!-- Form End -->
</body>
</html>