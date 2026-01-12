<?php include "db.php"; ?>

<form method="post">
    Username: <input name="username"><br>
    Email: <input name="email"><br>
    Password: <input type="password" name="password"><br>
    <button name="register">Register</button>
</form>

<?php
if(isset($_POST['register'])){
    $u = $_POST['username'];
    $e = $_POST['email'];
    $p = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $conn->query("INSERT INTO users VALUES (NULL,'$u','$e','$p','user')");
    echo "Registered";
}
?>
