<?php
session_start();
$conn =  new mysqli("localhost", "root", "", "users_Fakhrutdinova");
$id = $_SESSION['id'];
$sql = "select * from user where id='$id'";

$res = $conn->query($sql);
$user = mysqli_fetch_assoc($res);
$status = $_SESSION['status'];
if($status == '1')echo 'you is admin';
else echo 'you not admin';
?>

<form method='post'>
    <p>редактирование данных</p>
    <span>name</span>
<input name='name' value="<?= $user['name'] ?>"><br>
    
<input type='submit' name='submit' value='сохранить'>
</form>

<?php

if(!empty($_POST['submit'])){
    $name = $_POST['name'];
    $surname = $_POST['surname'];

    $sql = "update User set name='$name'  where id='$id'";
 mysqli_query($conn,$sql);
    echo 'your data was updated';
}
echo '<a href="changePassword.php">Сменить пароль</a>';
echo '<br><a href="delete.php">удалить аккаунт</a>';
?>
