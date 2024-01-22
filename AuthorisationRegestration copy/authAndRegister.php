<form action="" method="POST">
<input name="name" placeholder="name">
<input name="login" placeholder="login">
    <input name="password" type="password" placeholder="password">
    <input type="submit">
</form>

<?php
$link = new mysqli("localhost", "root", "", "users_Fakhrutdinova");

if (!empty($_POST['login']) and !empty($_POST['password'])) {
    $login = $_POST['login'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $query = "INSERT INTO User SET login='$login', password='$password', name='$name', Role_ID=2";
    mysqli_query($link, $query);
    $_SESSION['auth'] = true; // пометка об авторизации
    echo "Регистрация и авторизация произошла успешо";

}
?>
