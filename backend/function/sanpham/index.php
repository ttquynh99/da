<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sản phẩm</title>
    <?php 
    include_once(__DIR__ . '/../../layouts/styles.php');
    ?>

    <!-- DataTable CSS -->
    <link href="/web/assets/vendor/DataTables/datatables.css" type="text/css" rel="stylesheet" />
    <link href="/web/assets/vendor/DataTables/Buttons-1.6.3/css/buttons.bootstrap4.min.css" type="text/css" rel="stylesheet" />


</head>
<body>
    
    <!-- header -->
    <?php 
    include_once(__DIR__ . '/../../layouts/partials/header.php');
    ?>
    <!-- end header -->

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <!-- sidebar -->
                <?php 
                include_once(__DIR__ . '/../../layouts/partials/sidebar.php');
                ?>
                <!-- end sidebar -->
            </div>
            <div class="col-md-8" >
            <!-- day la noi dung -->

            <h2>Danh sách sản phẩm</h2>
            <a href="create.php" class="btn btn-warning">Thêm mới</a>
            <?php
            include_once(__DIR__ . '/../../../dbconnect.php');
            $sql = <<<EOT
            SELECT sp.*
            ,lsp.lsp_ten
            ,nsx.nsx_ten
            ,km.km_ten,km.km_noidung,km_tungay,km_denngay  
            FROM sanpham sp
            JOIN loaisanpham lsp ON sp.lsp_ma=lsp.lsp_ma
            JOIN nhasanxuat nsx ON sp.nsx_ma=nsx.nsx_ma
            LEFT JOIN khuyenmai km ON sp.km_ma=km.km_ma
            ORDER BY sp.sp_ma desc
EOT;
            $result = mysqli_query($conn, $sql);
            $data = [];
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $km_ten=$row['km_ten'];
                $km_noidung=$row['km_noidung'];
                $km_tungay = date('d/m/Y', strtotime($row['km_tungay']));
                $km_denngay = date('d/m/Y', strtotime($row['km_denngay']));
                $km_tomtat='';
                if(!empty($km_ten)){
                    $km_tomtat = sprintf(
                        "Khuyến mãi : %s , nội dung: %s, thời gian : từ %s đến %s",
                                $km_ten, $km_noidung , $km_tungay, $km_denngay
                    );
                }
                $data[] = array(
                'sp_ma' => $row['sp_ma'],
                'sp_ten' => $row['sp_ten'],
                'sp_gia' => number_format($row['sp_gia'],2,".",",").'vnđ',
                'lsp_ten' => $row['lsp_ten'],
                'nsx_ten' => $row['nsx_ten'],
                'km_tomtat' => $km_tomtat,
                );
            }
            ?>
            <table id="tblDanhsach" border="1">
                <thead>
                    <tr>
                        <th>Mã sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá sản phẩm</th>
                        <th>Loại sản phẩm</th>
                        <th>Nhà sản xuất</th>
                        <th>Khuyến mãi</th>
                        <th> Hành động </th>
                    </tr>
                </thead>
                <tbody>
            <?php foreach($data as $sp): ?>
                    <tr>
                        <td> <?php echo $sp['sp_ma']; ?> </td>
                        <td> <?php echo $sp['sp_ten']; ?> </td>
                        <td> <?php echo $sp['sp_gia']; ?> </td>
                        <td> <?php echo $sp['lsp_ten']; ?> </td>
                        <td> <?php echo $sp['nsx_ten']; ?> </td>
                        <td> <?php echo $sp['km_tomtat']; ?> </td>
                        <td>
                            <a href="edit.php?sp_ma=<?= $sp['sp_ma'] ?>" class="btn btn-warning">Sửa</a>
                            <button class="btn btn-danger btnDelelte" data-sp_ma="<?= $sp['sp_ma'] ?>">Xoá</a>
                        </td>
                    </tr>
            <?php endforeach; ?>
            </tbody>
            </table>
            </div>
        </div>
    </div>
    <!-- footer -->
    <?php 
    include_once(__DIR__ . '/../../layouts/partials/footer.php');
    ?>
    <!-- end footer -->

    <?php include_once(__DIR__ . '/../../layouts/scripts.php'); ?>
    <!-- DataTable JS -->
    <script src="/web/assets/vendor/DataTables/datatables.min.js"></script>
    <script src="/web/assets/vendor/DataTables/Buttons-1.6.3/js/buttons.bootstrap4.min.js"></script>
    <script src="/web/assets/vendor/DataTables/pdfmake-0.1.36/pdfmake.js"></script>
    <script src="/web/assets/vendor/DataTables/pdfmake-0.1.36/vfs_fonts.js"></script>

    <!-- SweetAlert -->
    <script src="/web/assets/vendor/sweetalert/sweetalert.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tblDanhsach').DataTable({
                dom: 'Bfrtip',
                buttons: [
                'copy', 'excel', 'pdf'
                ]
                });
                $('.btnDelete').click(function(){
            swal({
                title: "Bạn có chắc chắn muốn xóa?",
                text: "Một khi đã xóa, không thể phục hồi....",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {// Nếu đồng ý xóa
                    // 2. Lấy giá trị của thuộc tính (custom attribute HTML) 'sp_ma'
                    var sp_ma = $(this).data('sp_ma');
                    var url = "delete.php?sp_ma=" + sp_ma;
                    
                    // Điều hướng qua trang xóa với REQUEST GET, có tham số sp_ma=...
                    location.href = url;
                } else {
                    swal("Cẩn thận hơn nhé!");
                }
            });
        });
    });
    </script>
</body>
</html>