<?php
$con = mysqli_connect('localhost', 'root', '', 'myecommstore');

// Check if the connection was successful
if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}

echo "Connection successful";
?>