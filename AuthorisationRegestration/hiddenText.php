<form action="" method="POST">
    <h2>Авторизация</h2>
    <input name="login">
    <input name="password" type="password">
    <input type="submit">
</form>

<?php
$link = new mysqli("localhost", "root", "", "users_Fakhrutdinova");
session_start(); 
 if (!empty($_SESSION['auth'])): ?>
    <!DOCTYPE html>
    <html>
    <head>
    </head>
    <body>
    <p>текст только для авторизованного пользователя</p>
    </body>
    </html>
<?php else: ?>
    <p>пожалуйста, авторизуйтесь</p>
<?php endif; ?>
