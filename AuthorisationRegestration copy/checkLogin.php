<form action="" method="POST">
    <input name="login" placeholder="login">
    <input name="name" placeholder="name">
    <input type="password" name="password" placeholder="password">
     <input type="submit">
</form>
<?php
$link = new mysqli("localhost", "root", "", "users_Fakhrutdinova");

if (!empty($_POST['login']) and !empty($_POST['password']) and !empty($_POST['name'])) {
    $login = $_POST['login'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $query = "SELECT * FROM User WHERE login='$login'";
    $user = mysqli_fetch_assoc(mysqli_query($link, $query));
    if (empty($user)) {
        $query = "INSERT INTO User SET login='$login', password='$password', name='$name',  Role_ID=1";
        mysqli_query($link, $query);
        $_SESSION['auth'] = true;
        echo "Зарегистрировали";

    } else {
        $_SESSION['auth'] = false;
        echo "логин занят";
        // логин занят, выведем сообщение об этом
    }
}
?>
