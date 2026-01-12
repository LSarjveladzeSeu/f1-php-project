<?php
session_start();
include "../db.php";

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
    die("Admins only");
}
?>

<h2>Admin Panel - Racers CRUD</h2>

<form method="post">
    Racer name: <input name="name">
    Team ID: <input name="team_id">
    <button name="add">Add Racer</button>
</form>

<?php
if(isset($_POST['add'])){
    $conn->query("INSERT INTO racers VALUES (NULL,'".$_POST['name']."','".$_POST['team_id']."','')");
}
?>

<h3>Existing Racers</h3>

<?php
$r = $conn->query("SELECT * FROM racers");
while($row = $r->fetch_assoc()){
    echo $row['name']." 
    <a href='panel.php?del=".$row['id']."'>Delete</a><br>";
}

if(isset($_GET['del'])){
    $conn->query("DELETE FROM racers WHERE id=".$_GET['del']);
    header("Location: panel.php");
}
?>

