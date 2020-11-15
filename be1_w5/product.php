<?php
require_once './config/config.php';
require_once './config/database.php';
spl_autoload_register(function ($class_name) {
    require './app/model/' . $class_name . '.php';
});
$productModel = new ProductModel();
$name = explode('.', $_SERVER['REQUEST_URI']);
$id = $name[count($name) - 1];
$product = $productModel->getProductByID($id);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin sản phẩm</title>
</head>

<body>
    <div class="card" style="display: inline-block;">
        <img class="card-img-top img-fluid" src="/<?php echo BASE_URL;?>/images/<?php echo $product['product_photo'] ?>" alt="">
        <div class="card-body">
            <h4 class="card-title"><?php echo $product['product_name'] ?></h4>
            <p class="card-text"><?php echo $product['product_description'] ?></p>
            <p class="card-text"><?php echo $product['product_price'] ?></p>
        </div>
    </div>
</body>

</html>