<?php
    $idmuonxoa = $_GET['idmuonxoa'];
    ////1
    include_once(__DIR__ . '/../../../dbconnect.php');
    ////2
    $sql = <<<EOT
    delete from `hinhthucthanhtoan`
    where httt_ma= $idmuonxoa;
EOT;
    // 3. Thực thi
    mysqli_query($conn, $sql);
?>