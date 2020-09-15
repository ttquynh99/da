<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form thêm mới</title>
</head>
<body>
    <h1>Form thêm mới</h1>
    <form name="frmthem" id="frmthem" method="POST" action="">
    <table>
        <tr>
            <td> Tên Hình Thức Thanh Toán</td>
        </tr>
        <tr>
            <td> <input type="text" name="text_httt_ten" id="text_httt_ten"/>
            </td>        
        </tr>
        <tr>
            <td>
                <input type="submit" name="luudl" id="luudl" value="Lưu">
            </td>
        </tr>
    </table>
    </form>
    <?php
                    // Hiển thị tất cả lỗi trong PHP
                    // Chỉ nên hiển thị lỗi khi đang trong môi trường Phát triển (Development)
                    // Không nên hiển thị lỗi trên môi trường Triển khai (Production)
                    ini_set('display_errors', 1);
                    ini_set('display_startup_errors', 1);
                    error_reporting(E_ALL);
                    // Truy vấn database
                    // 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
                    include_once(__DIR__ . '/../../dbconnect.php');
                    // Chưa đăng nhập -> Xử lý logic/nghiệp vụ kiểm tra Tài khoản và Mật khẩu trong database
                    if (isset($_POST['btnLogin'])) {
                        // Phân tách thông tin từ người dùng gởi đến qua Request POST
                        $kh_tendangnhap = $_POST['kh_tendangnhap'];
                        $kh_matkhau = $_POST['kh_matkhau'];
                        // Câu lệnh SELECT Kiểm tra đăng nhập...
                        $sqlSelect = <<<EOT
                        SELECT *
                        FROM khachhang kh
                        WHERE kh.kh_tendangnhap = '$kh_tendangnhap' AND kh.kh_matkhau = '$kh_matkhau';
EOT;
                        // Thực thi SELECT
                        $result = mysqli_query($conn, $sqlSelect);
                        // Sử dụng hàm `mysqli_num_rows()` để đếm số dòng SELECT được
                        // Nếu có bất kỳ dòng dữ liệu nào SELECT được <-> Người dùng có tồn tại và đã đúng thông tin USERNAME, PASSWORD
                        if (mysqli_num_rows($result) > 0) {
                            // Lưu thông tin Tên tài khoản user đã đăng nhập
                            $_SESSION['kh_tendangnhap_logged'] = $kh_tendangnhap;
                            echo 'Đăng nhập thành công!';
                            // Điều hướng (redirect) về trang chủ
                            echo '<script>location.href = "/php/myhand/backend/pages/dashboard.php";</script>';
                        } else {
                            echo '<h2 style="color: red;">Đăng nhập thất bại!</h2>';
                        }
                    }
                endif;
                ?>
                <!-- End block content -->
            </main>
        </div>
    </div>

    <?php
        if( isset($_POST['luudl']) ) {
            $httt_ten = $_POST['text_httt_ten']; 
            include_once(__DIR__ . '/../dbconnect.php');

            // 2. Chuẩn bị QUERY
            $sql = "INSERT INTO `hinhthucthanhtoan` (httt_ten) VALUES (N'$httt_ten');";

            // 3. Thực thi
            mysqli_query($conn, $sql);
        }
    
    ?>
</body>
</html>