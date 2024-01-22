<form action="" method="POST">
    <h2>logout</h2>
    <input name="login">
    <input name="password" type="password">
    <input type="submit">
</form>

<?php
$link = new mysqli("localhost", "root", "", "users_Fakhrutdinova");
session_start();
if (!empty($_SESSION['auth'])) {
    $_SESSION['auth'] = null;
    echo " <!DOCTYPE html>
    <html>
    <head>
    </head>
    <body>
    <p>выйдите из акккауента</p>
    </body>
    </html>";
} else {
    echo " <p>пожалуйста, авторизуйтесь</p>";
    
}
?>