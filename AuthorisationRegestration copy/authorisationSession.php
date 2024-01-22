<form action="" method="POST">
    <h2>Авторизация</h2>
    <input name="login">
    <input name="password" type="password">
    <input type="submit">
</form>

<?php
$link = new mysqli("localhost", "root", "", "users_Fakhrutdinova");
session_start();
if (!empty($_POST['password']) and !empty($_POST['login'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $query = "SELECT * FROM User WHERE login='$login' AND password='$password'";
    $result = mysqli_query($link, $query);
    $user = mysqli_fetch_assoc($result);
    if (!empty($user)) {
        $_SESSION['auth'] = true;
        $_SESSION["id"] = $user['id'];

        echo "прошел авторизацию";
    } else {
        // неверно ввел логин или пароль
        echo "Не прошел авторизацию";

    }
}
?>
