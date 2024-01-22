<h2>Спена пароля</h2>
<form method='post'>

    <span>old password</span>
    <input name='old' type='password'><br>
    <span>new password</span>
    <input name='new' type='password'><br>
    
    <input type='submit' name='submit' value='сменить'>
</form>
<?php
session_start();

// Проверяем, аутентифицирован ли пользователь
if (!isset($_SESSION["id"])) {
    echo "Вы не авторизованы!";
    exit;
}

$link = new mysqli("localhost", "root", "", "users_Fakhrutdinova");

if(isset($_POST['submit'])){
    $id = $_SESSION["id"];
    
    $sql = "SELECT * FROM User WHERE id='$id'";


    $res = $link->query($sql);
    $user = mysqli_fetch_assoc($res);
    echo  "Имя пользователя - " . $user['name'] ."<br>";

    $hash = $user['password'];
    $old = $_POST['old'];
    $new = $_POST['new'];
    
    if ($old == $hash) {
      //$newHash = password_hash($new, PASSWORD_DEFAULT);
        $set = "UPDATE User SET password='$new' WHERE id='$id'";
        $link->query($set);
        echo 'Пароль успешно обновлен (на  ' . $new  .")";
    } else {
        echo 'Старый пароль неправильный';
    }
}
?>

 