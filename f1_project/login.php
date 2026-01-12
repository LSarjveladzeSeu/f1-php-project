<?php
session_start();
include "db.php";
?>

<form method="post">
    Username: <input name="username"><br>
    Password: <input type="password" name="password"><br>
    <button name="login">Login</button>
</form>

<?php
if(isset($_POST['login'])){
    $u = $_POST['username'];
    $p = $_POST['password'];
    $res = $conn->query("SELECT * FROM users WHERE username='$u'");
    $row = $res->fetch_assoc();
    if($row && password_verify($p, $row['password'])){
        $_SESSION['user'] = $row['username'];
        $_SESSION['role'] = $row['role'];
        header("Location: index.php");
    } else {
        echo "Login failed";
    }
}
?>
