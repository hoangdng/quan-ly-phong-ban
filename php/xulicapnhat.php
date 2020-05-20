<?php
$host = 'localhost';
$dbname = 'dulieu';
$username = 'root';
$password = '';
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $idpb = addslashes($_GET['idpb']);;
    $tenpb = addslashes($_GET['tenpb']);
    $mota = addslashes($_GET['mota']);
    $query = "UPDATE phongban SET 
            TenPB = '$tenpb', 
            MoTa = '$mota'
            where IDPB = $idpb";
    $link = mysqli_connect('localhost', 'root', '', 'dulieu');
    $sql = mysqli_query($link, $query);
    header("Location:capnhat.php");
} catch (PDOException $pe) {
    die("Could not connect to the database $dbname :" . $pe->getMessage());
}
