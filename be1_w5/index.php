<?php
require_once './config/database.php';
spl_autoload_register(function ($class_name) {
    require './app/model/' . $class_name . '.php';
});
$productModel = new ProductModel();
$productList = $productModel->getProducts();
$category = new CategoryModel();
$categoryList = $category->getCategories();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sản phẩm</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .card-img-top {
            width: 150px;
            height: 120px;
        }
        .card{
            text-align: center;
            margin-top: 10px;
            padding: 5px;
            margin: 5px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <?php foreach ($categoryList as $value) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><?php echo $value['category_name'] ?></a>
                    </li>
                <?php } ?>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
    <table>
        <?php
        foreach ($productList as $product) {
        ?>
            <div class="card" style="display: inline-block;">
                <img class="card-img-top img-fluid" src="images/<?php echo $product['product_photo'] ?>" alt="">
                <div class="card-body">
                    <a class="card-title"><?php echo $product['product_name'] ?></a>
                    <p class="card-text"><?php echo $product['product_description'] ?></p>
                    <p class="card-text"><?php echo $product['product_price'] ?></p>
                </div>
            </div>
        <?php
        }
        ?>
    </table>

</body>

</html>