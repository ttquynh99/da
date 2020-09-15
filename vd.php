<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form name="ftimkiem" id="ftimkiem" method="GET" action="">
    <h2>Tên sản phẩm</h2>
    <input type="text" name ="timkiem" id="timkiem" value=""> 
    <h2> Loại sản phẩm </h2>
    <input type="checkbox" name="lsp[]" id="lsp_1" value="1"> Máy tính bảng <br/>
    <input type="checkbox" name="lsp[]" id="lsp_2" value="2"> Máy tính xách tay<br/>
    <input type="checkbox" name="lsp[]" id="lsp_3" value="3"> Điện thoại<br/>
    <input type="checkbox" name="lsp[]" id="lsp_4" value="4"> Linh phụ kiện<br/>

    <h2>Nhà sản xuất </h2>
    <input type="checkbox" name="nsx[]" id="nsx_1" value="1"> Apple <br/>
    <input type="checkbox" name="nsx[]" id="nsx_2" value="2"> Samsung <br/>
    <input type="checkbox" name="nsx[]" id="nxs_3" value="3"> HTC <br/>
    <input type="checkbox" name="nsx[]" id="nsx_4" value="4"> Nokia <br/>

    <h2>Khuyến mãi</h2>
    <input type="radio" name="khuyenmai" id="khuyenmai_1" value="1">Khuyến mãi <br/>
    <input type="radio" name="khuyenmai" id="khuyenmai_2" value="2">Khuyến mãi trung thu <br/>  

    <input type="button" name="tk" id="tk" value="Tìm kiếm">

</form>
</body>
</html>