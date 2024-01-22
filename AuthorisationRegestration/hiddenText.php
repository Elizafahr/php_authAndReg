<?php
session_start();

$link = new mysqli("localhost", "root", "", "users_Fakhrutdinova");
if ($link->connect_error) {
    die("Ошибка подключения к базе данных: " . $link->connect_error);
}

if (!empty($_POST['password']) and !empty($_POST['login'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $query = "SELECT * FROM User WHERE login='$login' AND password='$password'";
    $result = mysqli_query($link, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $_SESSION['auth'] = true;
        echo "Авторизация прошла успешно";
    } else {
        echo "Неверный логин или пароль";
    }
}

if (!empty($_SESSION['auth'])) { 
    echo "текст только для авторизованного пользователя";
} else { 
    ?>
    <form action="" method="POST">
        <h2>Авторизация</h2>
        <input name="login">
        <input name="password" type="password">
        <input type="submit">
    </form>
    <p>Пожалуйста, авторизуйтесь</p>
    <?php 
}
?>