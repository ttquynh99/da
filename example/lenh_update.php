<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update</title>
</head>
<body>
    <h1> Lệnh Update </h1>
    <?php
        include_once(__DIR__ . '/../dbconnect.php');

        $httt_ten = 'Tiền mặt' ;
        $httt_ma = 1;

        $sql = <<<EOT
        UPDATE hinhthucthanhtoan
        SET 
            httt_ten= '$httt_ten'
        WHERE httt_ma='$httt_ma'
EOT;

        mysqli_query($conn,$sql);
    ?>
    
</body>
</html>