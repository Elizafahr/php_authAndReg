<?php
if(!isset($_POST['login'])) $savedLog = "";
else $savedLog = $_POST['login'];
?>
<form method='post'>
    <span>login</span>
    <input name='login' type='text' value='<?= $savedLog ?>'><br>
    <span>password</span>
    <input name='password' type='password'>
    <br>
    <span>confirm password</span>
    <input name='confirm' type='password'>
    <input type='submit' value='Войти'>
</form>

<?php
session_start();
$_SESSION['auth'] = null;
$link = new mysqli("localhost", "root", "", "users_Fakhrutdinova");
if(!empty($_POST['password']) and !empty($_POST['login']) and !empty($_POST['confirm'])){
    if($_POST['password'] == $_POST['confirm']){

        $login = $_POST['login'];

        $password = password_hash( $_POST['password'], PASSWORD_DEFAULT);
    
        $query = "SELECT * FROM user WHERE login='$login'";
        $_SESSION['id'] = $id;
        $status = 2;
        $result = $link->query($query);
        $user = mysqli_fetch_assoc($result);
        
        if(empty($user)){

            $register = "insert into user set login='$login', password='$password', salt='$salt', status_id='$status'";
            $registration = $link->query($register);

            echo 'вы зарегистрированы';
            $_SESSION['auth'] = true;
    
            $id = mysqli_insert_id($link);
        }
        else echo 'login уже занят';
    }
    else echo 'пароли не совпадают';
}
?>
<?php if (!empty($_SESSION['auth'])): ?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>

<p>вы аторизованны</p>

</body>
</html>

<?php endif; ?>