<?php
$host = 'localhost';
$dbname = 'dulieu';
$username = 'root';
$password = '';
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $listNV = implode("','", $_POST['checkbox']);
    $query = "delete from `nhanvien` where IDNV in ('$listNV')";
    $link = mysqli_connect('localhost', 'root', '', 'dulieu');
    $sql = mysqli_query($link, $query);
    mysqli_close($link);
    header("Location:nhanvien.php");
} catch (PDOException $pe) {
    die("Could not connect to the database $dbname :" . $pe->getMessage());
}
?>