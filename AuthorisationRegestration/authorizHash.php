<form method='post'>
    <span>login</span>
    <input name='login' type='text'><br>
    <span>password</span>
    <input name='password' type='password'>
    <input type='submit' value='Войти'>
</form>



<?php

session_start();
$conn =  new mysqli("localhost", "root", "", "users_Fakhrutdinova");
if (!empty($_POST['password']) and !empty($_POST['login'])) {
    $login = $_POST['login'];

    $checkLogin = "SELECT * FROM User WHERE login='$login'";
    $res = $conn->query($checkLogin);
    $log = mysqli_fetch_assoc($res);
    print_r($log);
    if (!empty($log)) {

        $hash = $log['password'];


        $password = md5($_POST['password']);


        if (password_verify($_POST['password'], $hash)) {
            echo 'вы авторизованы';
            $_SESSION['auth'] = true;
            $_SESSION['id'] = $log['id'];
            $_SESSION['status'] = $log['status_id'];
            echo '<br><a href="account.php">личный кабинет</a>';
        } else echo 'wrong login or password';
    } else echo 'this user does not exist';
}
?>

<?php if (!empty($_SESSION['auth'])) : ?>
    <!DOCTYPE html>
    <html>

    <head>
    </head>

    <body>
        <a href='logout.php'>logout</a>
        <p>текст только для авторизованного пользователя</p>
    </body>

    </html>
<?php else : ?>
    <p>пожалуйста, авторизуйтесь</p>
<?php endif; ?>