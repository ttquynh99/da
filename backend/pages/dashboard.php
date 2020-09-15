<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

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
        <div class="col-md-4">
        <!-- Sidebar -->
            <?php
                include_once(__DIR__.'/../layouts/partials/sidebar.php');
            ?>
        <!-- end Sidebar -->
        </div>
        <div class="col-md-8">
        
            Ví dụ
            
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