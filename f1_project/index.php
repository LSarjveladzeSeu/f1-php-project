<?php session_start(); ?>
<?php include "db.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Formula 1 Project</title>
</head>
<body>
    <?php
if(!isset($_SESSION['user'])){
    echo "Not logged in";
} else {
    echo "Logged in as ".$_SESSION['user'];
}
?>


<h1>Formula 1 Database View (PHP)</h1>

<h2>Teams</h2>
<?php
$r = $conn->query("SELECT * FROM teams");
while($row = $r->fetch_assoc()){
    echo $row['id']." - ".$row['name']."<br>";
}
?>

<h2>Racers</h2>
<?php
$r = $conn->query("SELECT racers.name, teams.name AS team FROM racers JOIN teams ON racers.team_id=teams.id");
while($row = $r->fetch_assoc()){
    echo $row['name']." (".$row['team'].")<br>";
}
?>

<h2>Races</h2>
<?php
$r = $conn->query("SELECT * FROM races");
while($row = $r->fetch_assoc()){
    echo $row['race_name']." - ".$row['race_date']."<br>";
}
?>

<h2>Users</h2>
<?php
$r = $conn->query("SELECT id, username, role FROM users");
while($row = $r->fetch_assoc()){
    echo $row['username']." (".$row['role'].")<br>";
}
?>

<h2>Ratings</h2>
<?php
$r = $conn->query("SELECT * FROM ratings");
if($r->num_rows == 0){
    echo "No ratings yet";
}
while($row = $r->fetch_assoc()){
    echo "Rating ID: ".$row['id']."<br>";
}
?>

</body>
</html>

<h2>Total Racers</h2>
<?php
$r = $conn->query("SELECT COUNT(*) AS total FROM racers");
$row = $r->fetch_assoc();
echo $row['total'];
?>

<?php
if(isset($_SESSION['user'])){
    echo "<p>Welcome, logged user</p>";
}
?>

