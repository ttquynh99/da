<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Danh sách Hình thức thanh toán</title>

    <?php include_once(__DIR__ . '/../../layouts/styles.php'); ?>
</head>
<body>
    
    <!-- header -->
    <?php include_once(__DIR__ . '/../../layouts/partials/header.php'); ?>
    <!-- end header -->


    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <!-- sidebar -->
                <?php include_once(__DIR__ . '/../../layouts/partials/sidebar.php'); ?>
                <!-- end sidebar -->
            </div>
            <div class="col-md-8">
                
                <h1>Danh sách Hình thức thanh toán</h1>
                <?php
                    
                  
                    include_once(__DIR__ . '/../../../dbconnect.php');

                    // 2. Chuẩn bị QUERY
                    // HERE DOC
                    $sql = <<<EOT
                    SELECT httt_ma AS MaThanhToan, httt_ten AS TenThanhToan FROM `hinhthucthanhtoan`
EOT;

                    // 3. Yêu cầu PHP thực thi QUERY
                    $result = mysqli_query($conn, $sql);

                    // 4. Khi thực thi các truy vấn dạng SELECT, dữ liệu lấy về cần phải phân tích để sử dụng
                    // Thông thường, chúng ta sẽ sử dụng vòng lặp while để duyệt danh sách các dòng dữ liệu được SELECT
                    // Ta sẽ tạo 1 mảng array để chứa các dữ liệu được trả về
                    $data = [];
                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        $data[] = array(
                            'ma' => $row['MaThanhToan'],
                            'ten' => $row['TenThanhToan'],
                        );
                    }

                    // print_r($data);
                    ?>

                    <a class="btn btn-primary" href="create.php">Thêm mới</a>
                    <table border="1">
                        <tr>
                            <th>Mã TT</th>
                            <th>Tên TT</th>
                            <th>Hành động</th>
                        </tr>
                        <?php foreach($data as $tt): ?>
                        <tr>
                            <td><?php echo $tt['ma'] ?></td>
                            <td><?= $tt['ten'] ?></td>
                            <td>
                                <!-- ?key1=value1&key2=value2... -->
                                <a href="delete.php?idmuonxoa=<?= $tt['ma'] ?>">Xóa</a>

                                <a href="edit.php?idmuonsua=<?= $tt['ma'] ?>">Sửa</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>



            </div>
        </div>
    </div>

    <!-- footer -->
    <?php include_once(__DIR__ . '/../../layouts/partials/footer.php'); ?>
    <!-- end footer -->

    <?php include_once(__DIR__ . '/../../layouts/scripts.php'); ?>
</body>
</html>