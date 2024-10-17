<?php
$mysqli = new mysqli("DATA", "user", "password", "testdb");


if ($mysqli->connect_error) {
    die("Connect failed to BD: " . $mysqli->connect_error);
}

$sql = "SELECT * FROM utilisateur";
$result = $mysqli->query($sql);

if (!$result) {
    die("failed reserch: " . $mysqli->error);
}

while ($row = $result->fetch_assoc()) {
    echo "Data Original: " . $row["name"] . $row["age"] . $row["email"] . "<br>";
}

$sqlInsert = "INSERT INTO utilisateur (name, age, email) VALUES ('John', 25, 'john@efrei.net')";
if ($mysqli->query($sqlInsert) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sqlInsert . "<br>" . $mysqli->error;
}

$sql1 = "SELECT * FROM utilisateur";
$result1 = $mysqli->query($sql1);

if (!$result1) {
    die("failed reserch: " . $mysqli->error);
}

while ($row = $result1->fetch_assoc()) {
    echo "<br>Data Edited: " . $row["name"] . $row["age"] . $row["email"] . "<br>";
}
$mysqli->close();
?>
