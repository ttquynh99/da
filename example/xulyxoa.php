<?php
    $idmuonxoa=$_GET['idmuonxoa'];
    include_once(__DIR__ . '/../dbconnect.php');
    $sql = <<<EOT
        DELETE FROM hinhthucthanhtoan
        WHERE httt_ma = $idmuonxoa;
EOT;
    mysqli_query($conn,$sql);
?>