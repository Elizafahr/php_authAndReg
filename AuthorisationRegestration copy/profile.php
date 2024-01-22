<form method='post'>
    <span>Логин:</span> <br>
    <input name='login' type='text'><br>
    <span>Пароль:</span> <br>
    <input name='password' type='password'><br>
    <input type='submit' value='Войти'>
</form>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users_Fakhrutdinova";

if (!empty($_POST['login'])) {
    $login = $_POST['login'];

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Ошибка подключения: " . mysqli_connect_error());
    }

    $stmt = mysqli_prepare($conn, "SELECT User.*, role.name AS role_name FROM User JOIN role ON User.Role_ID = role.Role_ID WHERE User.login=?");
    mysqli_stmt_bind_param($stmt, "s", $login);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($res);

    if ($user) {
        echo "Логин: " . $user['login'] . "<br>";
        echo "Имя: " . $user['name'] . "<br>";
        echo "Пароль: " . $user['password'] . "<br>";
        echo "Роль: " . $user['role_name'];
    } else {
        echo 'Пользователь не существует';
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>