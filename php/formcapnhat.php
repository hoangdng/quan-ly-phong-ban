<?php
$host = 'localhost';
$dbname = 'dulieu';
$username = 'root';
$password = '';
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $idpb = $_REQUEST['IDPB'];
    $sql = "SELECT * FROM `phongban` where IDPB = '$idpb'";
    $link = mysqli_connect('localhost', 'root', '', 'dulieu');
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($result);
} catch (PDOException $pe) {
    die("Could not connect to the database $dbname :" . $pe->getMessage());
}
?>
<html>
<head>
<link href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.0/minty/bootstrap.min.css" rel="stylesheet" integrity="sha384-HqaYdAE26lgFCJsUF9TBdbZf7ygr9yPHtxtg37JshqVQi6CCAo6Qvwmgc5xclIiV" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>
<body>
    <form name="form" method="get" action="xulicapnhat.php">
        <div class="form-group row">
            <label for="idpb" class="col-sm-2 col-form-label">IDPB:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="idpb" value="<?php echo $row['IDPB']; ?>" readonly=true>
            </div>
        </div>
        <div class="form-group row">
            <label for="tenpb" class="col-sm-2 col-form-label" >Tên phòng ban:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="tenpb" required value="<?php echo $row['TenPB']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="mota" class="col-sm-2 col-form-label">Mô tả:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="mota" required value="<?php echo $row['MoTa']; ?>">
            </div>
        </div>
        <div class="form-group row">
                <input type="submit" class="form-control btn btn-info" name="update" value="Cập nhật">
        </div>
    </form>
</body>

</html>