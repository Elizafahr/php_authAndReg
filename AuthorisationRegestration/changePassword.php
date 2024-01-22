<form method='post'>
    
    <span>old password</span>
<input name='old' type='password'><br>
    <span>new password</span>
<input name='new' type='password'><br>
    <span>confirm new password</span>
<input name='newConf' type='password' ><br>
<input type='submit' name='submit' value='сменить'>
</form>

<?php
session_start();
$conn =  new mysqli("localhost", "root", "", "users_Fakhrutdinova");
$id = $_SESSION['id'];
$sql = "select * from user where id='$id'";
$res = $conn->query($sql);
$user = mysqli_fetch_assoc($res);

$hash = $user['password'];
$old = $_POST['old'];
$new = $_POST['new'];
$newConf = $_POST['newConf'];
if($new  == $newConf){

    if(password_verify($old, $hash)){
        $newHash == password_hash($new, PASSWORD_DEFAULT);
        $set = "update user set password='$new' where id='$id'";
        $conn->query($set);
        echo 'password was updated';
    }
    else echo 'incorrect old password';
}
else echo 'пароли не совпадают';
?>