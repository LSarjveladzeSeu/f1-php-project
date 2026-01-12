<?php
session_start();
include "db.php";

if(isset($_POST['rate'])){
    $conn->query("INSERT INTO ratings VALUES (NULL,1,".$_POST['racer'].",".$_POST['rating'].")");
    echo "Rating added";
}
?>

<form method="post">
    Racer ID: <input name="racer">
    Rating (1-5): <input name="rating">
    <button name="rate">Rate</button>
</form>

