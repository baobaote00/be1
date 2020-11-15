<?php
class ProductModel extends Db
{
    public function getProducts()
    {
        $sql = parent::$connection->prepare("SELECT * FROM products");
        return parent::select($sql);
    }
    public function getProductByID($id)
    {
        $sql = parent::$connection->prepare("SELECT * FROM products WHERE id=?");
        $sql->bind_param('i',$id);
        return parent::select($sql)[0];
    }
}
