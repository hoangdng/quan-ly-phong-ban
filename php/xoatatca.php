<?php
$host = 'localhost';
$dbname = 'dulieu';
$username = 'root';
$password = '';
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $sql = 'SELECT * FROM `nhanvien`';
    $link = mysqli_connect('localhost', 'root', '', 'dulieu');
    $result = mysqli_query($link, $sql);
} catch (PDOException $pe) {
    die("Could not connect to the database $dbname :" . $pe->getMessage());
}
?>

<!DOCTYPE html>
<html>

<head>
<link href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.0/minty/bootstrap.min.css" rel="stylesheet" integrity="sha384-HqaYdAE26lgFCJsUF9TBdbZf7ygr9yPHtxtg37JshqVQi6CCAo6Qvwmgc5xclIiV" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <title></title>
</head>

<body>
    <form action="xulixoatatca.php" method="POST">
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>IDNV</th>
                    <th>Ho va Ten</th>
                    <th>IDPB</th>
                    <th>Dia Chi</th>
                    <th>Chon nhan vien de xoa</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) : ?>
                    <tr>
                        <td>
                            <?php echo $row['IDNV']; ?>
                        </td>
                        <td>
                            <?php echo $row['HoTen']; ?>
                        </td>
                        <td>
                            <?php echo $row['IDPB']; ?>
                        </td>
                        <td>
                            <?php echo $row['DiaChi']; ?>
                        </td>
                        <td>
                            <input name="checkbox[]" type="checkbox" value="<?php echo $row['IDNV']; ?>" />
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <input type="submit" class ="btn btn-danger float-right" value="Xóa"/>
    </form>
</body>


</html>