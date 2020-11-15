<?php
class ProductModel extends Db
{
    public function getProducts()
    {
        $sql = parent::$connection->prepare("SELECT * FROM products");
        return parent::select($sql);
    }
}
