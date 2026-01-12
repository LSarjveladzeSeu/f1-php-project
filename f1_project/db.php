<?php
$conn = new mysqli("localhost", "root", "", "f1_db");
if ($conn->connect_error) {
    die("DB Error");
}
?>
