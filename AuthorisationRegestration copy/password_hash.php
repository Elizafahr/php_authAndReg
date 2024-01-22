<?php
    // Подключение к базе данных
    $link = new mysqli("localhost", "root", "", "users_Fakhrutdinova");
 
    // Проверяем, была ли отправлена форма
    if(isset($_POST['login']) && isset($_POST['password'])){
        // Получаем данные из формы
        $login = $link->real_escape_string($_POST['login']);
        $password = $link->real_escape_string($_POST['password']);
        
        // Подготавливаем и выполняем запрос для получения пользователя по логину
        $query = "SELECT * FROM User WHERE login='$login'";
        $result = $link->query($query);
        
        // Проверяем, есть ли пользователь с таким логином
        if ($result->num_rows > 0) {
            // Получаем данные пользователя
            $user = $result->fetch_assoc();
            $hash = $user['password']; // Соленый пароль из БД
            
            // Проверяем соответствие введенного пароля с хешем из базы данных
            if (password_verify($password, $hash)) {
                echo "Все ок, авторизуем...";
            } else {
                echo "Неверный пароль";
            }
        } else {
            echo "Пользователь с таким логином не существует";
        }
    }
?>

<form method='post'>
    <span>login</span>
    <input name='login' type='text' value='<?= isset($_POST['login']) ? $_POST['login'] : '' ?>'><br>
    <span>password</span>
    <input name='password' type='password'>
    <br>
    <input type='submit' value='Войти'>
</form>
