<?php
// hàm `session_id()` sẽ trả về giá trị SESSION_ID (tên file session do Web Server tự động tạo)
// - Nếu trả về Rỗng hoặc NULL => chưa có file Session tồn tại
if (session_id() === '') {
    // Yêu cầu Web Server tạo file Session để lưu trữ giá trị tương ứng với CLIENT (Web Browser đang gởi Request)
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng nhập</title>

    <?php
    include_once(__DIR__.'/../layouts/styles.php');
    ?>
</head>
<body>
    
<!-- Header -->
<?php
    include_once(__DIR__.'/../layouts/partials/header.php');
?>
<!-- End header -->
<div class="container">
    <div class="row">
        </div>
        <div class="col-md-12">
        
        <form name="frmLogin" id="frmLogin" method="post" action="">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card-group">
                                    <div class="card p-4">
                                        <div class="card-body">
                                            <h1>Đăng nhập</h1>
                                            <p class="text-muted">Nhập thông tin Tài khoản</p>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                    </div>
                                                    <input class="form-control" type="text" name="kh_tendangnhap" placeholder="Tên đăng nhập">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fa fa-lock"></i>
                                                        </span>
                                                    </div>
                                                    <input class="form-control" type="password" name="kh_matkhau" placeholder="Mật khẩu">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <button class="btn btn-primary px-4" name="btnLogin">Đăng nhập</button>
                                                </div>
                                                <div class="col-6 text-right">
                                                    <a class="btn btn-link px-0" href="forgot-password.php">Quên mật khẩu?</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
                                        <div class="card-body text-center">
                                            <div>
                                                <h2>Đăng ký</h2>
                                                <p>Đăng ký để làm thành viên của Trang web bán hàng. Bạn sẽ được một số quyền lợi nhất
                                                    định khi làm thành viên của Chúng tôi.</p>
                                                <a class="btn btn-primary active mt-3" href="register.php">Đăng
                                                    ký ngay!</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
            
        </div>
    </div>
</div>


<!-- Footer -->
<?php
    include_once(__DIR__.'/../layouts/partials/footer.php');
?>
<!-- end Footer -->
<?php
    include_once(__DIR__.'/../layouts/scripts.php');
 ?>


</body>
</html>
</body>
</html>