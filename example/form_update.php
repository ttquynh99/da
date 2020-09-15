<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form chỉnh sửa</title>
</head>
<body>
    <?php
    include_once(__DIR__.'/../dbconnect.php');
    $sql = <<<EOT
    SELECT httt_ma AS MaTT, httt_ten AS TenTT
    FROM `hinhthucthanhtoan`
EOT;

    $result = mysqli_query($conn,$sql);
    
    $dataRow = [];
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $dataRow[] = array(
        'httt_ma' => $row['MaTT'],
        'httt_ten' => $row['TenTT'],
    );
    }
    ?>
    <h1>Form chỉnh sửa</h1>
    <form name="frmsua" id="frmsua" method="POST" action="">
    <table border="1">
        <thead>
            <tr>
                <th>Mã Thanh Toán</th>
                <th>Tên Thanh Toán</th>
                <th> Sửa </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($dataRow as $httt): ?>
            <tr>
                <td><?= $httt['httt_ma']; ?></td>
                <td><?= $httt['httt_ten']; ?></td>
                <td>
                <a href="xuly_update.php?httt_ma=<?= $httt['httt_ma']?>"> Sửa</a>
                </td>
            </tr>
            <?php endforeach; ?>
    </form>
</body>
</html>