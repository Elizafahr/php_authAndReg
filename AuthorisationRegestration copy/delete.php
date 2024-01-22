
<?php
session_start();
$conn =  new mysqli("localhost", "root", "", "users_Fakhrutdinova");
$id = $_SESSION['id'];
$sql = "select * from user where id='$id'";


$res = $conn->query($sql);
$user = mysqli_fetch_assoc($res);

echo  "Имя пользователя - " . $user['name'];
$hash = $user['password'];
if(!empty($_POST['submit'])){

        $del = "delete from user where id='$id'";
       mysqli_query($conn,$del);
    echo 'account was deleted';
  
}
?>
<form method='post'>
<span>Введи пароль</span>
<input type='password' name='password'><br>
<input type='submit' value='delete' name='submit'>
</form>
