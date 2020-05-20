<?php
$host = 'localhost';
$dbname = 'dulieu';
$username = 'root';
$password = '';
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $idnv = ($_GET['idnv']);
    $hoten = ($_GET['hoten']);
    $diachi = ($_GET['diachi']);
    $idpb = ($_GET['idpb']);
    $query = "INSERT INTO `nhanvien` (IDNV, HoTen, IDPB, DiaChi) VALUES ($idnv, '$hoten', $idpb, '$diachi')";
    $link = mysqli_connect('localhost', 'root', '', 'dulieu');
    $sql = mysqli_query($link, $query);
    mysqli_close($link);
    header("Location:nhanvien.php");
} catch (PDOException $pe) {
    die("Could not connect to the database $dbname :" . $pe->getMessage());
}
