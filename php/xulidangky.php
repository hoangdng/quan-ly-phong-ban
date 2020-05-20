<?php
$host = 'localhost';
$dbname = 'dulieu';
$username = 'root';
$password = '';
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $username = ($_GET['username']);
    $password = ($_GET['password']);
    $query = "INSERT INTO `user` (id, username, password) VALUES (default, '$username', '$password')";
    $link = mysqli_connect('localhost', 'root', '', 'dulieu');
    $sql = mysqli_query($link, $query);
    mysqli_close($link);
    header("Location:../index.html");
} catch (PDOException $pe) {
    die("Could not connect to the database $dbname :" . $pe->getMessage());
}
