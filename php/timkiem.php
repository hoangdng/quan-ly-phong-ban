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
    <form action="timkiem.php" method="get">
        <div class="form-group row">
            <label for="name" class="col-2 col-form-label">Tên nhân viên:</label>
            <input type="text" class="form-control w-50 col-6" name="search">
            <input class="btn btn-primary col-2 ml-5" type="submit" name="ok" value="Tìm kiếm" />
        </div>
        <!--Search: <input type="text" name="search" />
        <input type="submit" name="ok" value="Search" />-->
    </form>
    <?php
    // Nếu người dùng submit form thì thực hiện
    if (isset($_REQUEST['ok'])) {
        // Gán hàm addslashes để chống sql injection
        $search = addslashes($_GET['search']);

        // Nếu $search rỗng thì báo lỗi, tức là người dùng chưa nhập liệu mà đã nhấn submit.
        if (empty($search)) {
            echo "Yêu cầu nhập dữ liệu vào ô trống";
        } else {
            // Dùng câu lênh like trong sql và sứ dụng toán tử % của php để tìm kiếm dữ liệu chính xác hơn.
            $query = "SELECT * FROM `nhanvien` where HoTen like '%$search%'";

            // Kết nối sql
            $link = mysqli_connect("localhost", "root", "", "dulieu");

            // Thực thi câu truy vấn
            $sql = mysqli_query($link, $query);

            // Đếm số đong trả về trong sql.
            $num = mysqli_num_rows($sql);

            // Nếu có kết quả thì hiển thị, ngược lại thì thông báo không tìm thấy kết quả
            if ($num > 0 && $search != "") {
                // Dùng $num để đếm số dòng trả về.
                echo "$num kết quả trả về với từ khóa <b>$search</b>";
                // Vòng lặp while & mysql_fetch_assoc dùng để lấy toàn bộ dữ liệu có trong table và trả về dữ liệu ở dạng array.
                echo '<table class="table table-bordered table-hover">';
                echo '<thead class="thead-dark">
                        <tr>
                            <th>IDNV</th>
                            <th>Ho va Ten</th>
                            <th>IDPB</th>
                            <th>Dia Chi</th>
                        </tr>
                    </thead>';
                while ($row = mysqli_fetch_assoc($sql)) {
                    echo '<tr>';
                    echo "<td>{$row['IDNV']}</td>";
                    echo "<td>{$row['HoTen']}</td>";
                    echo "<td>{$row['IDPB']}</td>";
                    echo "<td>{$row['DiaChi']}</td>";
                    echo '</tr>';
                }
                echo '</table>';
            } else {
                echo "Không tìm thấy kết quả!";
            }
        }
    }
    ?>
</body>

</html>