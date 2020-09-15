<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Select</title>
</head>
<body>
    <h1> Lệnh Select </h1>
    <?php
        include_once(__DIR__ . '/../dbconnect.php');
        $sql = <<<EOT
            SELECT httt_ma AS MaTT, httt_ten AS TenTT
                FROM `hinhthucthanhtoan` 
EOT;
        $result = mysqli_query($conn,$sql);

        $data=[];
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $data[] = array(
                'ma' => $row ['MaTT'],
                'ten' => $row['TenTT']
            );

        }
       
    ?>
       <table border="1">
        <thead>
            <tr>
                <th>Mã Thanh Toán</th>
                <th>Tên Thanh Toán</th>
                <th> Xóa </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data as $httt): ?>
            <tr>
                <td><?= $httt['ma']; ?></td>
                <td><?= $httt['ten']; ?></td>
                <td>
                <a href="xulyxoa.php?idmuonxoa=<?= $httt['ma']?>"> Xóa</a>
                </td>
            </tr>
            <?php endforeach; ?>
    
</body>
</html>