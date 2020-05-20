<?php
$host = 'localhost';
$dbname = 'dulieu';
$username = 'root';
$password = '';
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $idnv = ($_REQUEST['IDNV']);
    $query = "DELETE FROM nhanvien where IDNV = $idnv";
    $link = mysqli_connect('localhost', 'root', '', 'dulieu');
    $sql = mysqli_query($link, $query);
    mysqli_close($link);
    header("Location:nhanvien.php");
} catch (PDOException $pe) {
    die("Could not connect to the database $dbname :" . $pe->getMessage());
}
