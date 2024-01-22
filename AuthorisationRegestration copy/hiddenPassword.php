<form action="" method="POST">
    <input name="login" placeholder="login">
    <input name="name" placeholder="name">
    <input type="password" name="password" placeholder="password">
    <input type="password" name="confirm" placeholder="confirm">
    <input type="submit">
</form>
<?php
if (!empty($_POST['login']) and !empty($_POST['password']) and !empty($_POST['confirm'])) {
    if ($_POST['password'] == $_POST['confirm']) {
        echo "регистрируем";
        // регистрируем
    } else {
        echo "несовпадение";
        // выведем сообщение о несовпадении
    }
}
?>
