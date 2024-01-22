<form method='post'>
<span>id</span>
<input name='id' type='text'><br>
<input type='submit' value='найти'>
</form>

<?php
$conn =  new mysqli("localhost", "root", "", "users_Fakhrutdinova");
if(!empty($_POST['id'])){
    $id = $_POST['id'];
$sql = "select * from user where id='$id'";
$res = $conn->query($sql);
$user = mysqli_fetch_assoc($res);
if(!empty($user))echo $user['login'];
else echo 'this user does  not exist';
 }
?>
