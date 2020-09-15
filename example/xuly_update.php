<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa</title>
</head>
<body>
<?php
        include_once(__DIR__ . '/../dbconnect.php');

        $httt_ma = $_GET['httt_ma'];
        
        $sqlSelect = <<<EOT
            SELECT httt_ma AS MaTT, httt_ten AS TenTT
                FROM `hinhthucthanhtoan` 
                WHERE httt_ma = $httt_ma;
EOT;
        $resultSelect = mysqli_query($conn,$sqlSelect);

        $data=[];
        while ($row = mysqli_fetch_array($resultSelect, MYSQLI_ASSOC)){
            $data = array(
                'httt_ma' => $row ['MaTT'],
                'httt_ten' => $row['TenTT'],
            );
        }
       
?>
    <form name="frmxulysua" id="frmxulysua" method="POST" action="">
    <table>
        <tr>
            <td> Tên Hình Thức Thanh Toán</td>
        </tr>
        <tr>
            <td> <input type="text" name="httt_ten" id="httt_ten" value ="<?php echo $data['httt_ten'] ?>" />
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
    if(isset($_POST['luudl'])){
        $httt_ten = $_POST['httt_ten'];
        $sql = <<<EOT
        UPDATE `hinhthucthanhtoan`
        SET 
            httt_ten= '$httt_ten'
        WHERE httt_ma=$httt_ma
EOT;

        mysqli_query($conn,$sql) or die("<b>Có lỗi khi thực thi câu lệnh SQL: </b>" . mysqli_error($conn));
    }
?>
</body>
</html>