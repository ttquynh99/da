<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Insert</title>
</head>
<body>
    <h1> Lệnh Insert </h1>
    <?php
        include_once(__DIR__ . '/../dbconnect.php');

        $tenhinhthucthanhtoan = 'CODE';
        $sql = "INSERT INTO `hinhthucthanhtoan`(httt_ten) VALUE (N'CODE');";
        mysqli_query($conn, $sql);
    ?>
    
</body>
</html>